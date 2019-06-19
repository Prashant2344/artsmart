<?php

namespace App\Http\Controllers\Admin;

use Image;
use DB;
use App\Gallery;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::get();
        return view ('admin.list.gallery',compact('galleries'));
    }

    public function create()
    {
        return view('admin.form.gallery');
    }

    public function store(Request $request)
    {
        //create and save Gallery
        $gallery = new Gallery();

        $gallery->name = request('name');
        $gallery->slug = str_slug($request->name);

        $file = request()->file('image');

        if($file != null) {

            $image_name = request('name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            // $watermark = Image::make('assets/images/ad.jpg');
            // $watermark->opacity(50);
            // // insert a watermark
            // $img->insert($watermark , 'center', 40, 40);

            // save image in desired format
            $img->save('uploads/'.'galleries/'.$image_name);

            $gallery->image = $image_name;
        }
        $gallery->save();

       /////////////// /*For multiple photo*////////////////////
        $photos = request()->file('photo');

        if($photos != null) {

            foreach ($photos as $pics) {
                $photo = new Photo();
                $image_name = request('name')."-".time()."-".$pics->getClientOriginalName();

                // open an image file
                $img = Image::make($pics);

                // save image in desired format
                $img->save('uploads/'.'photos/'.$image_name);

                $photo->photo = $image_name;
                $photo->gallery_id = $gallery->id;
                $photo->save();
            }
        }
        return redirect('/admin/galleries')->with('success','Gallery added successfully.');
    }

    public function edit($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        $photos = DB::table('photos')
            ->join('galleries', 'galleries.id', '=', 'photos.gallery_id')
            ->select('photo','photos.id')
            ->where('gallery_id',$id)
            ->get();

        return view('admin.form.gallery',compact('gallery','photos'));
    }

    public function update($id)
    {
        $gallery = Gallery::find($id);

        $data = ([
            'name' => request('name'),
        ]);

        $file = request()->file('image');

        if($file != null) {

            //deleting previous image
            $image = $gallery->image;
            @unlink('uploads/'.'galleries/'.$image);

            $image_name = request('name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            $img->save('uploads/'.'galleries/'.$image_name);

            $data1 = (['image' => $image_name]);
            Gallery::where('id', $id)->update($data1);
        }

        Gallery::where('id', $id)->update($data);
        /////////////////////////Photo update/////////////////////////////
        $photos = request()->file('photo');

        if($photos != null){
            foreach ($photos as $pics)
            {
                $photo = new Photo();
                $image_name = request('name')."-".time()."-".$pics->getClientOriginalName();

                // open an image file
                $img = Image::make($pics);

                // save image in desired format
                $img->save('uploads/'.'photos/'.$image_name);

                $photo->photo = $image_name;
                $photo->gallery_id = $gallery->id;
                $photo->save();
            }
        }
        return redirect('/admin/galleries')->with('success','Gallery updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::where('id', $id)->first();

        if(isset($gallery))
        {
            $image = $gallery->image;
            @unlink('uploads/'.'galleries/'.$image);
            //deleting admin
            Gallery::where('id', $id)->delete();
            return back()->with('success','Gallery deletion Success.');
        }
        return redirect('/admin/galleries/')->with('error','Gallery deletion failed.');
    }


    //////////Delete individual photo from gallery////////////////////
    public function delete($id)
    {
        $photo = Photo::where('id', $id)->first();

        if(isset($photo))
        {
            $image = $photo->image;
            @unlink('uploads/'.'photos/'.$image);
            //deleting admin
            Photo::where('id', $id)->delete();
            return back()->with('success','Photo deletion Success.');
        }
        return redirect('/admin/photos/')->with('error','Photo deletion failed.');
    }
}
