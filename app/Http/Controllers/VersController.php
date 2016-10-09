<?php

namespace App\Http\Controllers;

use App\Ver;
use Illuminate\Http\Request;

use App\Http\Requests;

class VersController extends Controller
{
        public function index($slug=null) {
            if($slug==null){
                $id=date('z');
                $post = Ver::find($id);
            }else{
                $post = Ver::where('slug',$slug)->first();
            }


            // get previous post id

            $previousId = Ver::where('id', '<', $post->id)->max('id');
            $previous = Ver::find($previousId);
            $previous= $previous->slug;

            // get next post id
            $nextId = Ver::where('id', '>', $post->id)->min('id');
            $next = Ver::find($nextId);
            $next= $next->slug;

            return view('posts.verse')
                ->with('previous', $previous)
                ->with('next', $next)
                ->with('post', $post)
                ->with('title', 'Denné stíšenie');


        }

//    public function index($id=null) {
//        $id=($id==null)?date('z'):$id;
//
//        // get the current post
//        $post = Ver::find($id);
//
//        // get previous post id
//        $previous = Ver::where('id', '<', $post->id)->max('id');
//
//        // get next post id
//        $next = Ver::where('id', '>', $post->id)->min('id');
//
//        return view('posts.verse')
//            ->with('previous', $previous)
//            ->with('next', $next)
//            ->with('post', $post)
//            ->with('title', 'Denné stíšenie');


//    }





}
