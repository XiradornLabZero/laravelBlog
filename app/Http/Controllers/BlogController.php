<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    // slug correspond to route param and if i have multiple params
    // i must use into the function in the right order apper into the routes
    // es blog/{slug}/{id} >>>> getSingle($slug, $id)
    public function getSingle($slug) {
        // fetch on database with slug
        // $post = Post::where('slug', '=', $slug)->get(); collection of object
        // but i need the single post object
        $post = Post::where('slug', '=', $slug)->first(); # for a single post element

        // return a view and pass items collected from database
        return view('blog.single')->withPost($post);

    }

}
