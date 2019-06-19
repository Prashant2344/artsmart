<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Art;
use App\Gallery;
use App\Setting;
use DB;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $categories = Category::where('status',1)->orderBy('order','asc')->get();
       // $features = Article::where('featured',1)->limit(6)->get();
        $features = DB::table('arts')
            ->join('categories', 'categories.id', '=', 'arts.category_id')
            ->select('arts.*', 'categories.name As category','categories.color','categories.permalink')
            ->where('featured',1)
            ->limit(6)
            ->get();

        $latest = DB::table('arts')
            ->join('categories', 'categories.id', '=', 'arts.category_id')
            ->select('arts.*', 'categories.name As category','categories.color','categories.permalink')
            ->orderBy('id','desc')
            ->where('arts.status',1)
            ->limit(12)
            ->get();

        $popular = DB::table('arts')
            ->join('categories', 'categories.id', '=', 'arts.category_id')
            ->select('arts.*', 'categories.name As category','categories.color')
            ->orderBy('view_count','desc')
            ->limit(9)
            ->get();

        $galleries = Gallery::limit(4)->get();

        $setting = Setting::get()->first();

        $seo_title = $setting->seo_title;
        $seo_keyword = $setting->seo_keyword;
        $seo_description = $setting->seo_description;

        return view('website.home',compact('categories','features','galleries','latest','popular','seo_title','seo_keyword','seo_description'));
    }

    public function pages($permalink)
    {
        $categories = Category::where('status',1)->orderBy('order','asc')->get();
        $category = Category::where('permalink',$permalink)->first();

        if($category == null)
        {
            abort(404);
        }

        $data = DB::table('arts')
            ->join('categories', 'categories.id', '=', 'arts.category_id')
            ->select('arts.*')
            ->where('categories.permalink',$permalink)
            ->get();

        $category_title = DB::table('arts')
            ->join('categories', 'categories.id', '=', 'arts.category_id')
            ->select('categories.name','categories.permalink')
            ->where('categories.permalink',$permalink)
            ->get()
            ->first();
            
        $setting = Setting::get()->first();

        $seo_title = $setting->seo_title;
        $seo_keyword = $setting->seo_keyword;
        $seo_description = $setting->seo_description;

        return view('website.category',compact('category','categories','data','category_title','seo_title','seo_keyword','seo_description'));

    }

    public function gallery_page($slug)
    {
        $categories = Category::where('status',1)->orderBy('order','asc')->get();

        $photos = DB::table('photos')
            ->join('galleries', 'galleries.id', '=', 'photos.gallery_id')
            ->select('photo')
            ->where('galleries.slug',$slug)
            ->get();

        $gallery_name = DB::table('photos')
            ->join('galleries', 'galleries.id', '=', 'photos.gallery_id')
            ->select('galleries.name')
            ->where('galleries.slug',$slug)
            ->get()
            ->first();
        
            $setting = Setting::get()->first();

            $seo_title = $setting->seo_title;
            $seo_keyword = $setting->seo_keyword;
            $seo_description = $setting->seo_description;

        return view('website.gallery_page',compact('photos','categories','gallery_name','seo_title','seo_keyword','seo_description'));
    }
}
