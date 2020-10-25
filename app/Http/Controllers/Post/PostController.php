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
        $collection = Post::where('user_id', auth()->user()->id)->paginate();
        return view('post.index', compact('collection'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        return view('post.show', compact('post'));
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect(route('post.index'))->with('status', 'Data Inserted');
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('view', $post);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->update();
        return redirect(route('post.index'))->with('status', 'Data updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'))->with('status', 'Data deleted');
    }
}
