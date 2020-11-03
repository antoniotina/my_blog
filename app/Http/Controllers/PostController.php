<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function viewaddform()
    {
        return view('posts.addpost');
    }

    public function view($id)
    {
        $post = Post::firstWhere('id', $id);
        if (!$post) {
            return abort(404);
        }
        return view('posts.post', ['post' => $post]);
    }

    public function viewupdate($id)
    {
        $post = Post::firstWhere('id', $id);
        if (!$post || $post->user_id != Auth::id() && Auth::user()->role != 'moderator' && Auth::user()->role != 'admin') {
            return abort(404);
        }
        return view('posts.modify', ['post' => $post]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'posttext' => 'required|max:2000',
            'title' => 'required|max:255',
        ]);

        $post = Post::firstWhere('id', $id);

        if (!$post) {
            return abort(404);
        }

        $post->text = $request->posttext;
        $post->title = $request->title;
        $post->save();
        return redirect('/v/post/' . $post->id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'posttext' => 'required|max:2000',
            'title' => 'required|max:255',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->text = $request->posttext;
        $post->title = $request->title;
        $post->save();
        return redirect('/v/post/' . $post->id);
    }

    public function delete($id)
    {
        $post = Post::firstWhere('id', $id);
        $post->delete();
        return redirect('/home');
    }

    public function homepage()
    {
        $posts = Post::with('user')->paginate(5);
        return view('welcome', ['posts' => $posts]);
    }
}
