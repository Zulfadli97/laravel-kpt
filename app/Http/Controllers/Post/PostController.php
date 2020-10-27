<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Storage;
use File;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($request->keyword != null) {
            // query all user post using keyword
            $search = $request->keyword;
            $collection = $user->posts()
                            ->where('title', 'LIKE', '%'.$search.'%')
                            ->paginate(1);
        } else {
            //$collection = Post::where('user_id', auth()->user()->id)->paginate();
            $collection = $user->posts()->paginate(1);
        }

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

        if ($request->hasFile('attachment')) {
            // rename 24-2020-10-26.jpg
            $filename = $post->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();

            // store dekat storage
            Storage::disk('public')->put($filename, File::get($request->attachment));

            // update row with attachment name
            // POPO - plain old php object
            $post->attachment = $filename;
            $post->save();
        }
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
        $post = Post::find($id);

        if ($post->attachment != null) {
            // delete from storage
            Storage::disk('public')->delete($post->attachment);
        }

        $post->delete();
        
        return redirect(route('post.index'))->with('status', 'Data deleted');
    }
}
