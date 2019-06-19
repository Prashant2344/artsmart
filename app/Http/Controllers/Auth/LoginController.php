<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Hash;
use Auth;
use Image;
use DB;
use Validator;
use App\User;
use App\Category;
use App\Setting;
use App\Mail\UserConfirmation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('userLogout');
    }

    public function showRegisterForm()
    {
        $categories = Category::where('status',1)->orderBy('order','asc')->get();
        $setting = Setting::get()->first();

        $seo_title = $setting->seo_title;
        $seo_keyword = $setting->seo_keyword;
        $seo_description = $setting->seo_description;

        return view('website.signup',compact('categories','seo_title','seo_keyword','seo_description'));
    }

    public function register(Request $request, User $user)
    {
       
        //validate the form
        $this->validate(request(), [
            'fullname' => 'required',
            'number' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:admins,email,'.$user->id,
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);

        //create and save category
        $user = new User();

        $user->fullname = request('fullname');
        $user->number = request('number');
        $user->password = Hash::make($request->password);
        $user->email = request('email');
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

        \Mail::to($user)->send(new UserConfirmation($user));

        //redirect to dashboard
        return redirect('/');
    }

    public function verification($token)
    {
        //fetch user by token
        $user = User::whereToken($token)->first();

        //Update valid user
        if(isset($user)) {
        DB::table('users')
            ->where('token', $user->token)
            ->update(['status' => 1]);

            return redirect()->intended(route('message'))->with('success','Your email is verified.');
        } else {
            return redirect('website/login')->with('error','Email could not be verified, Please try again.');
        }
    }

    public function message()
    {
        return view('website.message');
    }

    public function ajaxlogin(Request $request)
    {

        //validate the input
        $valid = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($valid->fails()) {
            return response()->json(['error'=>'Enter Username and Password']);
        }

        //To check valid user
        $check = User::where('email',$request->email)->get()->first();

        //To check email address exist or not
        if ($check == null) {
            return response()->json(['error'=>'Invalid Email Addres']);
        }

        //if email verified or not
        if($check->status == 1) {

            //Attempt to log the user in
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

                //if successful then redirect to dashboard
                return response()->json(['success'=>'Login Success !!']);
            
            }

            //if unsuccessful then return back to login
            return response()->json(['error'=>'Username and Password didnot match']);

        } else {

            // if  email address is not verified 
            return response()->json(['error'=>'Email address not Verified. Please check your mail']);

        }
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        // dd($provider);
        return Socialite::driver($provider)->redirect();
        // return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        
        // dd($provider.'mk');
        $githubuser = Socialite::driver($provider)->user();
        // $githubuser = Socialite::driver('github')->user();
        //dd($githubuser->getId());

        $user = User::where('provider_id',$githubuser->getId())->first();

        if(!$user){
            //add user to database
            $user = User::create([
                'email' => $githubuser->getEmail(),
                'fullname' => $githubuser->getNickname(),
                'image' => $githubuser->getAvatar(),
                'provider_id' => $githubuser->getId(),
            ]);
        }
        

        //log user in
        Auth::login($user,true);

        return redirect($this->redirectTo);
        // $user->token;
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
