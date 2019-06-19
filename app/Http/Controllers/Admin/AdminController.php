<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::get();
        return view('admin.list.admin',compact('admins'));
    }

    public function create()
    {
        return view('admin.form.admin');
    }

    public function store(Request $request,Admin $admin)
    {
        //validate the form
        $this->validate(request(), [

            'fullname' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'

        ]);

        //create and save category
        $admin = new Admin();

        $admin->fullname = request('fullname');
        $admin->password = Hash::make($request->password);
        $admin->email = request('email');
        $admin->status = request('status');

        $file = request()->file('image');

        if($file != null) {

            $image_name = request('fullname')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            // save image in desired format
            $img->save('uploads/'.'admins/'.$image_name);

            $admin->image = $image_name;
        }

        $admin->save();

        //redirect to dashboard
        return redirect('/admin/admins')->with('success','Admin created successfully.');
    }

    public function show(Admin $admin)
    {
        //
    }

    public function edit(Admin $admin)
    {
        $id = $admin->id;
        if($admin->id !== Auth::guard('admin')->user()->id){
            abort(403);
        }
        $admin = Admin::where('id', $id)->first();
        return view('admin.form.admin',compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        $this->validate(request(), [

            'fullname' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'

        ]);

        $data = ([
            'fullname' => request('fullname'),
            'email' => request('email'),
            'password' => Hash::make($request->password),
            'status' => request('status'),
        ]);

        $file = request()->file('image');

        if($file != null) {

            //deleting previous image
            $image = $admin->image;
            @unlink('uploads/'.'admins/'.$image);

            $image_name = request('fullname')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            $img->save('uploads/'.'admins/'.$image_name);

            $data1 = (['image' => $image_name]);
            Admin::where('id', $id)->update($data1);
        }

        Admin::where('id', $id)->update($data);

        //redirect to dashboard
        return redirect('/admin/admins')->with('success','Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = Admin::where('id', $id)->first();

        if(isset($admin))
        {
            $image = $admin->image;
            @unlink('uploads/'.'admins/'.$image);
            //deleting admin
            Admin::where('id', $id)->delete();
            return redirect('/admin/admins')->with('success','Admin deleted successfully.');

        }

        return redirect('/admin/admins')->with('error','Admin deletion failed.');
    }
}
