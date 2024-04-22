<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function welcome()
    {
        $posts = Post::all();
        return view('welcome', ['posts' => $posts]);
    }
    
    public function index()
    {
        // get all posts from database

        $posts = Post::all();
        
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => "required"
        ]);

        auth()->user()->posts()->create($validated);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => "required"
        ]);

        $post->update($validated);
                
        return to_route('posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return to_route('posts.index');
    }
    
    public function search()
    {
        $posts = Post::all();

        return view('posts.search', ['posts' => $posts]);
    }
    
    public function searchQuery(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            ->get();

        } else {
            $posts = Post::all();
        }
        return view('posts.search', ['posts' => $posts]);
    }
    

}

