<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\PostsCreateRequest;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

use App\Post;

use App\Photo;

use App\Category;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::lists('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {

        //assigning request

        $input = $request->all();

        //getting logged in user
        $user = Auth::user();
       // return $request->all();


       //checking if we have a file
        if ($file = $request->file('photo_id')) {
            

            $name = time() .$file->getClientOriginalName();
       //move the file to images

            $file->move('images' , $name);
        
        //creating photo
            $photo = Photo::create(['file'=>$name]);

        //in the post we insert phoyo id
            $input['photo_id'] = $photo->id;
           // return "its working";
        }


        $user->posts()->create($input);

        return redirect('/admin/posts');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
