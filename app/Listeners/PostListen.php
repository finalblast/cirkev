<?php

namespace App\Listeners;

use App\Events\PostEvent;
use App\Post;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use Illuminate\Support\Facades\Mail;

class PostListen
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostEvent  $event
     * @return void
     */
    public function handle(PostEvent $event)
    {
//        Counting show post view
        $post = $event->post;
        \DB::table('posts')->where('slug', $post->slug)->increment('count_view');


//        Sending notification email about reading
        if ( $post->count_view == 103 || $post->count_view == 305 || $post->count_view == 605 || $post->count_view == 1005
        AND $post->user->send_email == 1 ) {
        \Mail::send ('emails.notification_reading',
            $data = array(
                'title' => $post->title,
                'text' => $post->text,
                'pocetPozreti' => $post->count_view,
                'user_name' => $post->user->name,
                'slug' => $post->slug,
//                for email sending
            'userEmail'=> $post->user->email,
            'userName'=> $post->user->name
            ), function($message) use($data)
            {
                $message->from('admin@cirkevonline.sk', 'Cirkev-Online');
                $message->to( $data['userEmail'], $data['userName'])->subject('Rekapitulácia zobrazenia článku');
            });
        }


    }

}
