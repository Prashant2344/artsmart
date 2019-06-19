<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.list.category',compact('categories'));
    }

    public function create()
    {
        return view('admin.form.category');
    }

    public function store(Request $request)
    {
        //validate the form
        $this->validate(request(), [

            'name' => 'required',
            'color' => 'required',
            'description' => 'required',
            'order' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //create and save category
        $category = new Category();

        $category->name = request('name');
        $category->permalink = request('permalink');
        $category->color = request('color');
        $category->description = request('description');
        $category->seo_title = request('seo_title');
        $category->seo_keyword = request('seo_keyword');
        $category->seo_description = request('seo_description');
        $category->order = request('order');
        $category->status = request('status');

        $file = request()->file('image');

        if($file != null) {

            $image_name = request('name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            // save image in desired format
            $img->save('uploads/'.'categories/'.$image_name);

            $category->image = $image_name;
        }

        $category->save();

        //redirect to dashboard
        return redirect('/admin/categories')->with('success','Category created successfully.');
    }

    public function edit($permalink)
    {
        $category = Category::where('permalink', $permalink)->first();
        return view('admin.form.category',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        //validate the form
        $this->validate(request(), [
            'name' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = ([
            'name' => request('name'),
            'permalink' => request('permalink'),
            'color' => request('color'),
            'description' => request('description'),
            'seo_title' => request('seo_title'),
            'seo_keyword' => request('seo_keyword'),
            'seo_description' => request('seo_description'),
            'order' => request('order'),
            'status' => request('status'),
        ]);

        $file = request()->file('image');

        if($file != null) {

            //deleting previous image
            $image = $category->image;
            @unlink('uploads/'.'categories/'.$image);

            $image_name = request('name')."-".time()."-".$file->getClientOriginalName();

            // open an image file
            $img = Image::make($file);

            $img->save('uploads/'.'categories/'.$image_name);

            $data1 = (['image' => $image_name]);
            Category::where('id', $id)->update($data1);
        }

        Category::where('id', $id)->update($data);

        //redirect to dashboard
        return redirect('/admin/categories')->with('success','Category updated successfully.');
    }

    public function destroy($permalink)
    {
        $category = Category::where('permalink', $permalink)->first();

        //dd($category->image);
        if(isset($category))
        {
            $image = $category->image;
            @unlink('uploads/'.'categories/'.$image);
            //deleting admin
            Category::where('permalink', $permalink)->delete();
            return redirect('/admin/categories/')->with('success','Category deleted successfully.');

        }

        return redirect('/admin/categories/')->with('error','Category deletion failed.');
    }
}
