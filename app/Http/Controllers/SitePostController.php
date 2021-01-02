<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SitePostController extends Controller
{
    //
    public function index(Request $request, $subsite,$post_slug=null)
    {
        $post = '';
        if($post_slug)
        {
            $post = Post::where('slug',$post_slug)->published()->firstOrFail();
        }
        $categories = Category::with('subcategories')->get();
        $template = 't1';
        return view('templates.'.$template.'.index',compact('categories','post'));
    }

    // public function viewPost(Request $request,$subsite,$post_slug)
    // {
    //     $post = Post::where('slug',$post_slug)->firstOrFail();
    //     $template = 't1';
    //     return view('templates.'.$template.'.post',compact('post'));
    // }

}
