<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function create()
    {
        $setting = Setting::get()->first();
        return view('admin.form.settings',compact('setting'));
    }

    function youtube_id_from_url($url) {
        $pattern =
            '%^# Match any youtube URL
            (?:https?://)?  # Optional scheme. Either http or https
            (?:www\.)?      # Optional www subdomain
            (?:             # Group host alternatives
              youtu\.be/    # Either youtu.be,
            | youtube\.com  # or youtube.com
              (?:           # Group path alternatives
                /embed/     # Either /embed/
              | /v/         # or /v/
              | /watch\?v=  # or /watch\?v=
              )             # End path alternatives.
            )               # End host alternatives.
            ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
            $%x'
        ;
        $result = preg_match($pattern, $url, $matches);
        if ($result) {
            return $matches[1];
        }
        return "fail";
    }

    public function store()
    {
        //validate the form
        $this->validate(request(), [

            'site_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //create and save category
        $setting = new Setting();

        $setting->site_name = request('site_name');
        $setting->email = request('email');
        $setting->phone = request('phone');
        $setting->mobile = request('mobile');
        $setting->address = request('address');
        $setting->seo_title = request('seo_title');
        $setting->seo_keyword = request('seo_keyword');
        $setting->seo_description = request('seo_description');
        $setting->facebook = request('facebook');
        $setting->twitter = request('twitter');
        $setting->instagram = request('instagram');
        $setting->youtube = request('youtube');
        $setting->video_id = $this->youtube_id_from_url(request('youtube'));

        $file = request()->file('image');

        if($file != null) {

            $image_name = request('site_name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            // save image in desired format
            $img->save('uploads/'.'settings/'.$image_name);

            $setting->image = $image_name;
        }

        $file = request()->file('image1');

        if($file != null) {

            $image_name = request('site_name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            // save image in desired format
            $img->save('uploads/'.'settings/'.$image_name);

            $setting->image1 = $image_name;
        }


        $setting->save();

        //redirect to dashboard
        return redirect('/admin');
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);

        //validate the form
        $this->validate(request(), [

            'site_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $data = ([
            'site_name' => request('site_name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'mobile' => request('mobile'),
            'address' => request('address'),
            'seo_title' => request('seo_title'),
            'seo_keyword' => request('seo_keyword'),
            'seo_description' => request('seo_description'),
            'facebook' => request('facebook'),
            'twitter' => request('twitter'),
            'instagram' => request('instagram'),
            'youtube' => request('youtube'),
            'video_id' => $this->youtube_id_from_url(request('youtube')),
        ]);

        $file = request()->file('image');

        if($file != null) {

            //deleting previous image
            $image = $setting->image;
            @unlink('uploads/'.'settings/'.$image);

            $image_name = request('site_name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            $img->save('uploads/'.'settings/'.$image_name);

            $data1 = (['image' => $image_name]);
            Setting::where('id', $id)->update($data1);
        }

        $file1 = request()->file('image1');

        if($file1 != null) {

            //deleting previous image
            $image = $setting->image1;
            @unlink('uploads/'.'settings/'.$image);

            $image_name = request('site_name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file1);

            $img->save('uploads/'.'settings/'.$image_name);

            $data2 = (['image1' => $image_name]);
            Setting::where('id', $id)->update($data2);
        }

        Setting::where('id', $id)->update($data);

        //redirect to dashboard
        return redirect('/admin/settings')->with('success','Setting updated successfully.');
    }
}
