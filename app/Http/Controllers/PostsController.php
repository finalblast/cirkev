<?php

namespace App\Http\Controllers;

use App\Events\PostEvent;
use App\Http\Requests\SavePostRequest;
use App\Post;
use App\Tag;
use Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use App\Http\Requests;

class PostsController extends Controller
{

    public function index (Request $request) {

        if ($request->has('search')) {
            $post = $request->input('search');
            $posts = Post::where('title', 'LIKE' , '%' . $post . '%' );
            $posts= $posts->paginate(9);

        } else {
            $posts = Post::where('group_id', '!=' , '5' )->orderBy('id', 'desc')->paginate(18);
//            $posts = Post::where('group_id', '!=' , '5' )->inRandomOrder()->paginate(18);

        }

        return view('posts.index')
            ->with('title', 'Nové príspevky')
            ->with('posts', $posts);
    }

    public function show ($slug) {

        $post = Post::whereSlug($slug)->firstOrFail();
        \Event::fire(new PostEvent($post));
        return view('posts.show')->with('post', $post)
            ->with('comments',$post->comments);
    }

    public function edit ($id) {

        $post = Post::findOrFail($id);
        $tags = Tag::all();
        $post->tags;
        $this->authorize('edit-post', $post);
        return view('posts.edit')
            ->with('post', $post)
            ->with('title', 'Upraviť článok')
            ->with('tags', $tags) ;
    }


    /**
     * @return mixed
     */
    public function create () {

        $tags = Tag::all();



        return view('posts.create')
            ->with('title', 'Vytvoriť článok')
            ->with('tags', $tags);
    }



    public function store(SavePostRequest $request) {

        $youtube_id = getYouTubeIdFromURL($request->input('video_link'));

        $post = \Auth::user()->posts()->create($request->all());

        if ($youtube_id !== null) {
            $post->update([
                'video_link' => $youtube_id
            ]);
        }

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $filename = ($image->getClientOriginalName());
            $extension = $image->getClientOriginalExtension() ?: 'png';
            $filename = $post->slug . '.' . $extension;

            $filepath = public_path('posts/' . $post->id);
            $image->move($filepath , $filename);

            $image = Image::make(file_get_contents($filepath. '/' . $filename))
                ->widen(900)->save($filepath. '/' . $filename);

            $post->update([
                'picture' => $filename,
            ]);
        }


//        // attach tags
        $this->syncTags($post, $request->get('tags'));
        flash()->success('Úspešné uložené');
        return redirect('/');
    }



    public function update(SavePostRequest $request, $id) {

        $post = Post::findOrFail($id);

        $this->authorize('edit-post', $post);
        $post->update($request->all() );
        $post->tags()->sync($request->get('tags')?:[] );

        if ($request->hasFile('picture'))  {
            $picture = $request->file('picture');
            $filepath = public_path('posts/' . $post->id);
//            $filename = str_slug($picture->getClientOriginalName());
            $extension = $picture->getClientOriginalExtension() ?: 'png';
            $filename = $post->slug . '.' . $extension;

            $picture->move($filepath, $filename);
            $picture = Image::make(file_get_contents($filepath. '/' . $filename))
                ->widen(900)->save($filepath. '/' . $filename);

            $post->update([
                'picture' => $filename
            ]);

        }




        // attach tags
        $this->syncTags($post, $request->get('tags'));
        flash()->success('Uspešné uložené');
        return redirect('/')->with('title', 'Príspevok upravený');


    }


    public function delete($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.delete')
            ->with('post', $post)
            ->with('title', 'Vymazať článok');
    }


    public function destroy ($id) {

        $post = Post::findOrFail($id);

        $this->authorize('edit-post', $post);

        \Auth::user()->posts()->findOrFail($id)->delete();


    //Vymazať adresar so súborom
        if(!public_path('posts/' . $post->id)) {
            rmDirectory(public_path('posts/' . $post->id));
        }



        flash()->success('Článok vymazaný');
        return redirect('/');
    }



    private function syncTags($post, $tags)
    {
        $post->tags()->sync($tags ?: []);
    }


}
