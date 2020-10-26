<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
// use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        //$collection = Post::where('user_id', auth()->user()->id)->paginate();
        $user = auth()->user();
        $collection = $user->posts()->paginate();

        // resources/views/post/index.blade.php - $collection
        return view('post.index', compact('collection'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    public function store(StorePostRequest $request)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'title' => 'required',
        //         'body' => 'required'
        //     ]
        // );

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect(route('post.index'))->with('status', 'Data Inserted');
    }

    public function update($id, StorePostRequest $request)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'title' => 'required',
        //         'body' => 'required'
        //     ]
        // );
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->update();
        return redirect(route('post.index'))->with('status', 'Data updated');
    }

    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return redirect(route('post.index'))->with('status', 'Data deleted');
    }
}
