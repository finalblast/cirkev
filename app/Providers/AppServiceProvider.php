<?php

namespace App\Providers;

use App\Post;
use App\Group;
use App\Comment;
use App\Tag;
use App\User;
use App\Ver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('seletBoxRequire', function($attribute, $value, $parameters, $validator) {

            if ($value<1) {
                return false;
            }
            return true;
        });




        view()->composer('partials.navigation', function ($view) {
//            $view->with('posledny', Post::latest()->first());
            $view->with('user', \Auth::user());
        });

        view()->composer('modul.statistika',  function($view) {
            $view->with('posledne_prispevky', Post::orderBy('count_view', 'desc')->take(5)->get());
            $view->with('posledne_com', Comment::orderBy('created_at', 'desc')->take(5)->get());
        });


        view()->composer('modul.spravy',  function($view) {
//            $view->with('posts', Post::where('group_id', '=', 5)->orderBy('id', 'desc')->take(8)->get());
            $view->with('posts', Post::where('group_id', '=', 5)->orderBy('id', 'desc')->take(1)->get());
            $view->with('postsNext', Post::where('group_id', '=', 5)->orderBy('id', 'desc')->skip(1) ->take(5)->get());
        });


//        view()->composer('modul.latestcom', function($view) {
//            $view->with('posledne_com', Comment::orderBy('text', 'desc')->take(5)->get());
//        });




        view()->composer(['modul.category', 'posts.form' ], function($view)
    {
        $view->with('categories', Group::all() );

    });

        view()->composer('posts.form', function($view)
        {
            $view->with('categories', Group::lists('name', 'id'));
            $view->with('users', User::lists('name', 'id'));
        });

        view()->composer('modul.tags', function($view)
        {
            $view->with('tags', Tag::all());
        });

        view()->composer('partials.carousel', function($view)
        {
            $view->with('users', \DB::table('users')->where('avatar', '!=' , '' )->orderBy('name')->get());
//            $view->with('users', User::all()->sortBy('name'));
        });


//// Poslať email pri uložení príspevku
//        \App\Post::saved(function($post) {
//
//            \Mail::send('emails.novy_prispevok',
//                array(
//                    'title' => $post->title,
//                    'text' => $post->text,
//                    'user_name' => $post->user->name
//                ), function($message)
//                {
//                    $message->from('admin@cirkevonline.sk');
//                    $message->to('gajdosgabo@gmail.com', 'Admin')->subject('Pribudol nový prísevok Cirkev-Online.sk');
//                });
//        } );



// Poslať email pri novom uživateľovi

//        \App\User::saved(function($user) {
//            \Mail::send('emails.novy_prispevok',
//                array(
//                    'title' => $user->name,
//                    'text' => $user->email
//
//                ), function($message)
//                {
//                    $message->from('admin@cirkevonline.sk');
//                    $message->to('gajdosgabo@gmail.com', 'Admin')->subject('Pribudol nový prísevok Cirkev-Online.sk');
//                });
//        } );

        }











    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
