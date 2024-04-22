<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => "required"
        ]);

        $post->update($validated);
                
        return to_route('admin', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin');
    }
}
