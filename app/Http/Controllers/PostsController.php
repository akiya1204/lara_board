<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        if (!empty($request->id) === true) {
            $query = Post::query();

            $posts = $query
                        ->join('post_categories', 'post_categories.ctg_id', '=', 'posts.ctg_id')
                        ->where('posts.ctg_id', $request->id)
                        ->orderBy('posts.created_at', 'desc')
                        ->paginate(10);
            $category = PostCategory::all();
        } else {
            $query = Post::query();
            $posts = $query
                        ->join('post_categories', 'post_categories.ctg_id', '=', 'posts.ctg_id')
                        ->orderBy('posts.created_at', 'desc')
                        ->paginate(10);
            $category = PostCategory::all();
        }

        return view('posts.index', [
            'posts' => $posts,
            'category' => $category,
        ]);
    }
    
    public function search(Request $request)
    {
        if (!empty($request->keyword) === true) {
            $query = Post::query();
            $posts = $query
                        ->join('post_categories', 'post_categories.ctg_id', '=', 'posts.ctg_id')
                        ->join('users', 'users.id', '=', 'posts.user_id')
                        ->where('title', 'like', '%' .$request->keyword . '%')
                        ->orWhere('body', 'like', '%' .$request->keyword . '%')
                        ->orWhere('category_name', 'like', '%' .$request->keyword . '%')
                        ->orWhere('name', 'like', '%' .$request->keyword . '%')
                        ->orderBy('posts.created_at', 'desc')
                        ->select(\DB::raw('posts.*,post_categories.*,users.name'))
                        ->paginate(10);
            $category = postCategory::all();
        } else {
            $query = Post::query();
            $posts = $query
                        ->join('post_categories', 'post_categories.ctg_id', '=', 'posts.ctg_id')
                        ->orderBy('posts.created_at', 'desc')
                        ->paginate(10);
            $category = PostCategory::all();
        }

        return view('posts/index',[
            'posts' => $posts,
            'category' => $category,
        ]);
    }

    public function create()
    {
        $category = PostCategory::all();
        // dd($category);

        return view('posts.create', ['category' => $category]);
    }

    public function store(Request $request)
    {
        $user = \Auth::user();
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
            'ctg_id' => 'integer',
            'image' => 'file|image',
        ]);

        if (array_key_exists('image',$params)) {
            $post = new Post;

            $post->user_id = $user->id;
            $post->ctg_id = $request->ctg_id;
            $post->body = $request->body;
            $post->title = $request->title;

            $filename = $request->file('image')->store('public/image');

            $post->image = basename($filename);

            $post->save();
        } else {
            $post = new Post;

            $post->user_id = $user->id;
            $post->ctg_id = $request->ctg_id;
            $post->body = $request->body;
            $post->title = $request->title;

            $post->save();
        }

        return redirect()->route('top');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        $user = Auth::user();
        $user_id = $user->id;

        return view('posts.show', [
            'post' => $post,
            'user_id' => $user_id
        ]);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);                      

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);
    
        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();
    
        return redirect()->route('posts.show', ['post' => $post]);
    }
}
