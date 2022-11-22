<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use App\Models\Seting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $setting = Seting::find(1);
        $all_category = category::where('status', '0')->get();
        $latest_posts = post::where('status', '0')->orderBy('created_at', 'DESC')->get()->take('15');
        return view('frontend/index', compact('all_category', 'latest_posts' , 'setting'));
    }
    public function viewCategoryPost(string $category_slug)
    {
        $category = category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {

            $post = post::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend/post/index', compact('post', 'category'));
        } else {
            return redirect('/');
        }
    }
    public function viewPost(string $category_slug, string $post_slug)
    {
        $category = category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {

            $post = post::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '0')->first();
            $latest_posts = post::where('category_id', $category->id)->where('status', '0')->orderBy('created_at', 'DESC')->get()->take(15);
            return view('frontend/post/view', compact('post', 'latest_posts'));
        } else {
            return redirect('/');
        }
    }
}
