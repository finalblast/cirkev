<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentsController extends Controller
{
    public function store( Request $request) {
        if (!$request->get('text') ) {

            return back()->withErrors([ 'text' => 'Musíte napísať komentár']);
        }


        $post = Post::findOrFail( $request->get('post_id')  );

        Comment::create([
            'post_id'=> $post->id,
            'user_id'=> \Auth::id(),
            'text' => $request->get('text'),

        ]);

        flash()->success('Komentár bol uložený');

        return redirect()->route('post.show', $post->slug);


    }

    public function show($id) {


    }
}
