<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagController extends Controller
{


    public function index($id) {

        $tag = Tag::findOrFail($id);


        return view ('posts.index')
            ->with('title' , $tag->tag)
            ->with('posts', $tag->posts);

    }

    public function show ($slug) {

        $category = Tag::where('slug' ,'=' , $slug)->firstOrFail();
        $posts = Post::where('group_id' , '=' , $category->id)->orderBy('id', 'desc')->Paginate(15);

        return view('posts.index')
            ->with('posts', $posts)
            ->with('title', $category->tag);
    }



}
