<?php

namespace App\Http\Controllers;

use App\Group;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class GroupController extends Controller
{

    public function indexUserEmail () {

        $users = User::all();

        return view('admin.category')->with('groups', $groups)->with('title', 'Kategórie článkov')
            ->with('users', $users);


    }



    public function index ($slug) {

        $category = Group::where('slug' ,'=' , $slug)->firstOrFail();
        $posts = Post::where('group_id' , '=' , $category->id)->orderBy('id', 'desc')->Paginate(15);

        return view('posts.index')
            ->with('posts', $posts)
            ->with('title', $category->name);
    }

    public function createNewGroup() {

        $groups = \App\Group::all();
        $users = User::all();

        return view('admin.category')->with('groups', $groups)->with('title', 'Kategórie článkov')
            ->with('users', $users);

    }


    public function store(Request $request) {

        $groups = Group::create($request->all());

        flash()->success('Kategória uložená!');

        return redirect('kategorie')->with('groups', $groups)->with('title', 'Kategórie článkov');

    }

    public function destroy ($id) {

        $group = Group::findOrFail($id);
        $group->delete();

        flash()->success('Kategória vymazaná!');
        return redirect('/');

    }





}


