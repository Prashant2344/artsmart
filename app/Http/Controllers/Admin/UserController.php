<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\User;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.list.user',compact('users'));
    }

    public function create()
    {
        return view('admin.form.user');
    }

    public function store(Request $request,User $user)
    {
        
        //validate the form
        $this->validate(request(), [

            'fullname' => 'required',
            'number' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'

        ]);
        

        //create and save category
        $user = new User();

        $user->fullname = request('fullname');
        $user->number = request('number');
        $user->password = Hash::make($request->password);
        $user->email = request('email');
        $user->status = request('status');
        $user->token = str_random(20);

        $file = request()->file('image');
        
        if($file != null) {

            $image_name = request('fullname')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            // save image in desired format
            $img->save('uploads/'.'users/'.$image_name);

            $user->image = $image_name;
        }

        $user->save();

        //redirect to dashboard
        return redirect('/admin/users')->with('success','User added successfully.');
    }

    public function edit(User $user)
    {
        $id = $user->id;
        $user = User::where('id', $id)->first();
        return view('admin.form.user',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);

        $this->validate(request(), [

            'fullname' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required_with:password_confirmation|same:password_confirmation',
        ]);

        $data = ([
            'fullname' => request('fullname'),
            'email' => request('email'),
            'password' => Hash::make($request->password),
            'status' => request('status'),
        ]);

        /////////// For password change//////////////////
        $pass = request('password');
        if($pass != null){
            $data2 = ([
                'password' => Hash::make(request('password'))
            ]);
            User::where('id', $id)->update($data2);
        }

        $file = request()->file('image');

        if($file != null) {

            //deleting previous image
            $image = $user->image;
            @unlink('uploads/'.'users/'.$image);

            $image_name = request('fullname')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            $img->save('uploads/'.'users/'.$image_name);

            $data1 = (['image' => $image_name]);
            User::where('id', $id)->update($data1);
        }

        User::where('id', $id)->update($data);

        //redirect to dashboard
        return redirect('/admin/users')->with('success','User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        if(isset($user))
        {
            $image = $user->image;
            @unlink('uploads/'.'users/'.$image);
            //deleting admin
            User::where('id', $id)->delete();
            return redirect('/admin/users')->with('success','User deleted successfully.');

        }

        return redirect('/admin/users')->with('error','User deletion failed.');
    }
}
