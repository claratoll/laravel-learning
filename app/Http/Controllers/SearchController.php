<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function query(Request $request)
    {
        if($request->has('search')){
            $posts = Post::search($request->search)->get();
        } else {
            $posts = Post::get();
        }

        return view('welcome', [
            'posts' => $posts
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title; 

        /**
         *  Scout will automatically persist the
         *  changes to your Algolia search index.
         */
        $post->update();
    }
}
