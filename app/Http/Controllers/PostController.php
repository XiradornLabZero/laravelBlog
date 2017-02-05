<?php
// created by php artisan make:controller PostController --resource
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // It's a backhand index NOT an site index

        //  So create a variable and store all the blog post in it from database
        $posts = Post::all();

        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // used for display the form
        // nothing else
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // this function have this tasks
        // validate data w/ $this->validate($request, array())
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body'  => 'required'
        ));

        // store data into the database
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        // two kind of session.
        // the FLASH session is a particular session that exist
        // ONLY for on e request and after it gone
        // PUT exist untile the session is removed
        Session::flash('success', 'The Blog post is correctly save !!!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        // return view('posts.show')->whit('post', $post);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // we must able to show the form with a get request
        // filled with the current data from posts database

        // after change the post, we doa post request and use
        //  the store function for put new data into database

        # first i can use the id from the get request for grab the
        # post from database
        $post = Post::find($id);

        # return the wiew with informations
        return view('posts.edit')->withPost($post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
