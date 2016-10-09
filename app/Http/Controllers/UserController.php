<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Http\Requests;

class UserController extends Controller
{
    public function index () {

        $users = User::all();

        return view('user.index')
            ->with('title', 'Zoznam autorov')
            ->with('users' , $users);
    }

    public function show ($slug) {

        $post = \App\Post::all();

        $user = User::whereSlug($slug)->firstOrFail();
        return view('user.show')
            ->with('posts', $post)
            ->with('user', $user);
    }

    public function edit ($id) {

        $user = User::findOrFail($id);
        return view('user.edit')
            ->with('title', 'Upraviť profil')
            ->with('user', $user);
    }




    public function update (Request $request, $id) {

        $user = User::findOrFail($id);
        $user->update( $request->all() );

        $image = $request->file('avatar');

        if ($image !== null) {
            $filename = ($image->getClientOriginalName());
            $extension = $image->getClientOriginalExtension() ?: 'png';
            $filename = $user->slug .'.'.$extension;

            $filepath = public_path('users/' . $user->id);
            $image->move($filepath , $filename);

            $image = Image::make(file_get_contents($filepath. '/' . $filename))
                ->widen(270)->save($filepath. '/' . $filename);

            $user->update([
                'avatar' => $filename,
            ]);

        }

        flash()->success('Uspešné upravené');
//        return redirect('/');


        return redirect()->route('user.show', $user->slug);

    }



}
