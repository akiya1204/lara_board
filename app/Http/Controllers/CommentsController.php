<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $user = \Auth::user();
        
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ]);

        $params['user_id'] = $user->id;
        $params['user_name'] = $user->name;

        $post = Post::findOrFail($params['post_id']);
        $post->comments()->create($params);

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function edit(Request $request) {
        $comment = Comment::findOrFail($request->comment);
        $post = $request->post;

        return view('posts.comment_edit', [
            'comment' => $comment,
            'post' => $post,
        ]);
    }

    public function update(Request $request)
    {
        $params = $request->validate([
            'body' => 'required|max:2000',
        ]);
    
        $comment = Comment::findOrFail($request->comment);
        $comment->fill($params)->save();
        $post = $request->post;
    
        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function delete(Request $request)
    {
        $query = Comment::query();
        $query->where('id',$request->comment);
        $query->update(['delete_flg' => 1]); 
        $post = $request->post;
    
        return redirect()->route('posts.show', ['post' => $post]);
    }
}
