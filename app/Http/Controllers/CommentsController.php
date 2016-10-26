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

        if( \Auth::user()->id !== $post->user->id AND $post->user->send_email == 1) {

            \Mail::send ('emails.notification_comment',
                $data = array(
                    'title' => $post->title,
                    'post_body' => $post->text,
                    'pocetPozreti' => $post->count_view,
                    'user_name' => $post->user->name,
                    'slug' => $post->slug,
                    'comment_body' => $request->get('text'),
//                for email sending
                    'userEmail'=> $post->user->email,
                    'userName'=> $post->user->name
                ), function($message) use($data)
                {
                    $message->from('admin@cirkevonline.sk', 'Cirkev-Online');
                    $message->to( $data['userEmail'], $data['userName'])->subject('Váš článok bol komentovaný');
                });
        }


        return redirect()->route('post.show', $post->slug);
    }

    public function destroy($id) {

        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect ('/');
    }

}
