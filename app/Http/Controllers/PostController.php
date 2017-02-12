<?php
// created by php artisan make:controller PostController --resource
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // It's a backhand index NOT an site index

        //  So create a variable and store all the blog post in it from database
        //$posts = Post::all(); #for all post
        $posts = Post::orderBy('id', 'desc')->paginate(10); #for paginate post
        #we also order element from the last id to the first

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
        // UPDATE - now we have to bring data from cat
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // we use the dump&die function from laravel
        // dd($request);

        // this function have this tasks
        // validate data w/ $this->validate($request, array())
        $this->validate($request, array(
            'title'         => 'required|max:191',
            'slug'          => 'required|alpha_dash|min:5|max:191|unique:posts,slug',
            'category_id'   => 'required|integer',
            'body'          => 'required'
        ));

        // store data into the database
        $post = new Post;

        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->body         = $request->body;

        $post->save();

        // after we have creted a post, we can attach the tags to it
        // so we also must create the reletionship. For doing this
        // i can use sync method
        if (isset($request->tags)) {
            # code...
            // $post->tags()->sync($request->tags, true); #now we want override the association into the db for replace current association
            $post->tags()->sync($request->tags); #equal to the upper line
        } else {
            #this line is used when we dont have any tag
            $post->tags()->sync(array()); #equal to the upper line
        }

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
        // so now we need to make an additional grabbing because there are cats now
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
        // whit UPDATE

        # first i can use the id from the get request for grab the
        # post from database
        $post = Post::find($id);

        // inject categories
        $categories = Category::all();
        // i must do the select loop into this controller because is a better solution than make into views
        $cats = []; #instanciate ary for setup all the elements and setup for view
        foreach ($categories as $category) {
            # code...
            $cats[$category->id] = $category->name;
        }

        // inject tags
        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            # code...
            $tags2[$tag->id] = $tag->name;
        }

        # return the wiew with informations
        // return view('posts.edit')->withPost($post)->withCategories($categories);
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);

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

        $post = Post::find($id);

        if($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title'         => 'required|max:191',
                'category_id'   => 'required|integer',
                'body'          => 'required'
            ));
        } else {
            // Validate data
            $this->validate($request, array(
                'title'         => 'required|max:191',
                'slug'          => 'required|alpha_dash|min:5|max:191|unique:posts,slug',
                'category_id'   => 'required|integer',
                'body'          => 'required'
            ));
        }

        // Save data to de database
        // we not create a new Post object
        $post = Post::find($id);

        $post->title = $request->input('title'); // input get parameters from GET or POST send
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        // laravel change autmatically the changed last timestamp

        $post->save();

        if (isset($request->tags)) {
            # code...
            // $post->tags()->sync($request->tags, true); #now we want override the association into the db for replace current association
            $post->tags()->sync($request->tags); #equal to the upper line
        } else {
            #this line is used when we dont have any tag
            $post->tags()->sync(array()); #equal to the upper line
        }

        // set flash data with success message
        Session::flash('success', 'This post was successfully changed !!!');

        // redirect to the same page updated post.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //now we must use the fuction detach for not have orphan elements
        // so now i don't have element referred to this post
        $post->tags()->detach();

        $post->delete();

        Session::flash('success', 'Post was successfully deleted!!!');

        return redirect()->route('posts.index');

    }
}
