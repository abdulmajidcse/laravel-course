<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();

        return view('post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|integer',
            'title'    => 'required|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png',
            'body'     => 'required|string',
        ]);

        $post = new Post();
        $post->category_id = $data['category'];
        $post->title = $data['title'];
        if(array_key_exists('image', $data)) {
            // upload new image and save
            $imageUrl = Storage::putFile('/', $data['image']);
            $post->image = $imageUrl;
        }
        $post->body = $data['body'];
        $post->save();

        return redirect()->back()->with('success', 'Successfully Post Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'category' => 'required|integer',
            'title'    => 'required|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png',
            'body'     => 'required|string',
        ]);

        $post->category_id = $data['category'];
        $post->title = $data['title'];
        if(array_key_exists('image', $data)) {
            // delete old image
            Storage::delete($post->image);
            // upload new image and save
            $imageUrl = Storage::putFile('/', $data['image']);
            $post->image = $imageUrl;
        }
        $post->body = $data['body'];
        $post->save();

        return redirect()->back()->with('success', 'Successfully Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete old image and post
        Storage::delete($post->image);
        $post->delete();

        return redirect()->back()->with('success', 'Successfully Post Deleted!');
    }
}
