<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::get();
        return view('admin.list.advertisement',compact('advertisements'));
    }

    public function create()
    {
        return view('admin.form.advertisement');
    }

    public function store(Request $request)
    {
        //validate the form
        $this->validate(request(), [

            'name' => 'required',
            'link' => 'required',
            'order' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //create and save category
        $advertisement = new Advertisement();

        $advertisement->name = request('name');
        $advertisement->slug = str_slug($request->name);
        $advertisement->link = request('link');
        $advertisement->order = request('order');
        $advertisement->status = request('status');

        $file = request()->file('image');
        
        if($file != null) {
            
            $image_name = request('name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);
            
            // save image in desired format
            $img->save('uploads/'.'advertisements/'.$image_name);
            

            $advertisement->image = $image_name;
            
        }

        $advertisement->save();

        //redirect to dashboard
        return redirect('/admin/advertisements')->with('success','Advertisement created successfully.');
    }

    public function edit($name)
    {
        $advertisement = Advertisement::where('name', $name)->first();
        return view('admin.form.advertisement',compact('advertisement'));
    }

    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::find($id);

        $this->validate(request(), [

            'name' => 'required',
            'link' => 'required',
            'order' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $data = ([
            'name' => request('name'),
            'link' => request('link'),
            'order' => request('order'),
            'status' => request('status'),
        ]);

        $file = request()->file('image');

        if($file != null) {

            //deleting previous image
            $image = $advertisement->image;
            @unlink('uploads/'.'advertisements/'.$image);

            $image_name = request('name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            $img->save('uploads/'.'advertisements/'.$image_name);

            $data1 = (['image' => $image_name]);
            Advertisement::where('id', $id)->update($data1);
        }

        Advertisement::where('id', $id)->update($data);

        //redirect to dashboard
        return redirect('/admin/advertisements')->with('success','Advertisement updated successfully.');
    }

    public function destroy($name)
    {
        $advertisement = Advertisement::where('name', $name)->first();

        if(isset($advertisement))
        {
            $image = $advertisement->image;
            @unlink('uploads/'.'advertisements/'.$image);
            //deleting admin
            Advertisement::where('name', $name)->delete();
            return redirect('/admin/advertisements')->with('success','Advertisement deleted successfully.');

        }

        return redirect('/admin/advertisements')->with('error','Advertisement deletion failed.');
    }
}
