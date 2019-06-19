<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Art;
use App\Category;
use App\User;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtController extends Controller
{
    public function index()
    {
        $arts = DB::table('arts')
            ->join('categories', 'categories.id', '=', 'arts.category_id')
            ->select('arts.*', 'categories.name')
            ->get();
        return view ('admin.list.art',compact('arts'));
    }

    public function create()
    {
        $categories = Category::get();
        $users = User::get();
        return view('admin.form.art',compact('categories','users'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [

            'category_id' => 'required',
            'title' => 'required',
            'artist_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //create and save category
        $art = new Art();

        $art->category_id = request('category_id');
        $art->artist_id = request('artist_id');
        $art->title = request('title');
        $art->slug = str_random(30);
        $date = request('date');
        $art->date = date("Y-m-d", strtotime($date) );
        $art->seo_title = request('seo_title');
        $art->seo_keyword = request('seo_keyword');
        $art->seo_description = request('seo_description');
        $art->status = request('status');
        $art->featured = request('featured');

        $file = request()->file('image');

        if($file != null) {

            $image_name = request('title')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            $watermark = Image::make('assets/images/ad.jpg');
            $watermark->opacity(50);
            // insert a watermark
            $img->insert($watermark , 'center', 40, 40);

            // save image in desired format
            $img->save('uploads/'.'arts/'.$image_name);

            $art->image = $image_name;
        }

        $art->save();

        //redirect to dashboard
        return redirect('/admin/arts')->with('success','Art created successfully.');
    }


    public function edit($slug)
    {
        $categories = Category::get();
        $art = Art::where('slug', $slug)->first();
//        $users = DB::table('articles')
//            ->join('users', 'users.id', '=', 'articles.writer_id')
//            ->select('users.*')
//            ->get();

        $users = User::get();
        return view('admin.form.art',compact('art','categories','users'));
    }

    public function update(Request $request, $id)
    {
        $art = Art::find($id);

        //validate the form
        $this->validate(request(), [
            'title' => 'required',
            'category_id' => 'required',
            'artist_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = ([
            'category_id' => request('category_id'),
            'artist_id' => request('artist_id'),
            'title' => request('title'),
            'date' => request('date'),
            'seo_title' => request('seo_title'),
            'seo_keyword' => request('seo_keyword'),
            'seo_description' => request('seo_description'),
            'status' => request('status'),
            'featured' => request('featured'),
        ]);

        $file = request()->file('image');

        if($file != null) {

            //deleting previous image
            $image = $art->image;
            @unlink('uploads/'.'arts/'.$image);

            $image_name = request('title')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            $img->save('uploads/'.'arts/'.$image_name);

            $data1 = (['image' => $image_name]);
            Art::where('id', $id)->update($data1);
        }

        Art::where('id', $id)->update($data);

        //redirect to dashboard
        return redirect('/admin/arts')->with('success','Art updated successfully.');
    }

    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->first();

        //dd($category->image);
        if(isset($article))
        {
            $image = $article->image;
            @unlink('uploads/'.'articles/'.$image);
            //deleting admin
            Article::where('slug', $slug)->delete();
            return redirect('/admin/articles/')->with('success','Page deleted successfully.');

        }

        return redirect('/admin/articles/')->with('error','Page deletion failed.');
    }
}
