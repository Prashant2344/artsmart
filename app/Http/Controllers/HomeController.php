<?php

namespace App\Http\Controllers;

use Hash;
use App\Post;
use App\User;
use DB;
use App\Category;
use App\Art;
use App\Setting;
use Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count=Post::where('artist_id',auth()->guard('web')->user()->id)->count();
        $categories = Category::where('status',1)->orderBy('order','asc')->get();

        $setting = Setting::get()->first();

        $seo_title = $setting->seo_title;
        $seo_keyword = $setting->seo_keyword;
        $seo_description = $setting->seo_description;

        return view('user.dashboard',compact('count','seo_title','seo_keyword','seo_description','categories'));
    }

    public function posts()
    {
        $categories = Category::where('status',1)->orderBy('order','asc')->get();
        $posts = DB::table('posts')
            ->join('users','users.id', '=', 'posts.artist_id')
            ->select('posts.*')
            ->where('users.id', auth()->guard('web')->user()->id )
            ->get();

        $setting = Setting::get()->first();
        $seo_title = $setting->seo_title;
        $seo_keyword = $setting->seo_keyword;
        $seo_description = $setting->seo_description;

        return view('user.posts',compact('posts','seo_title','seo_keyword','seo_description','categories'));
    }

    public function create()
    {
        $categories = Category::where('status',1)->orderBy('order','asc')->get();
        $setting = Setting::get()->first();

        $seo_title = $setting->seo_title;
        $seo_keyword = $setting->seo_keyword;
        $seo_description = $setting->seo_description;
        
        return view('user.add_post',compact('seo_title','seo_keyword','seo_description','categories'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //create and save category
        $post = new Post();

        $post->artist_id = request('artist_id');
        //dd(request('writer'));
        $post->title = request('title');

        $file = request()->file('image');

        if($file != null) {

            $image_name = request('title')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            // save image in desired format
            $img->save('uploads/'.'arts/'.$image_name);

            $post->image = $image_name;
        }

        $post->save();

        //redirect to dashboard
        return redirect('/post/add')->with('success','Art created successfully.');
    }

     ///////////// Edit User Profile//////////////////////////////////////////////
     public function edit()
     {
        $categories = Category::where('status',1)->orderBy('order','asc')->get();
        $user = DB::table('users')
             ->select('users.*')
             ->where('users.id', auth()->guard('web')->user()->id )
             ->get()
             ->first();
 
             $setting = Setting::get()->first();
 
             $seo_title = $setting->seo_title;
             $seo_keyword = $setting->seo_keyword;
             $seo_description = $setting->seo_description;
             
         return view('user.edit',compact('user','seo_title','seo_keyword','seo_description','categories'));
     }
 
     public function update(Request $request)
    {
        $user = User::find(auth()->guard('web')->user()->id);

        $this->validate(request(), [
            'fullname' => 'required',
            'number' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required_with:password_confirmation|same:password_confirmation',
        ]);

        $data = ([
            'fullname' => request('fullname'),
            'number' => request('number'),
            'email' => request('email'),
            'status' => 1,
        ]);

        /////////// For password change//////////////////
        $pass = request('password');
        if($pass != null){
            $data2 = ([
                'password' => Hash::make(request('password'))
            ]);
            User::where('id', auth()->guard('web')->user()->id)->update($data2);
        }

        /////////////For image update//////////////////////
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
            User::where('id', auth()->guard('web')->user()->id)->update($data1);
        }

        User::where('id', auth()->guard('web')->user()->id)->update($data);

        //redirect to dashboard
        return redirect('/profile/edit')->with('success','Profile updated successfully.');
    }

}
