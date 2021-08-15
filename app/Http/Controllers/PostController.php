<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function addPost()
    {
    	$model=new Post();
    	$model->title="Second Post";
    	$model->body="Second Post Description";
    	$model->save();
    	  return "Post Has been created ";

    }


    public function addComment($id)
    {
    	$post=Post::find($id);
    	$comment=new Comment();
    	$comment->comment="This is first comment";
    	$post->comments()->save($comment);
    	return "Comment Has been posted";
    }

    public function getPostComment($id)
    {
    	$comments=Post::find($id)->comments;
    	return $comments;
    }


    public function join()
    {
        $post=DB::table('posts')->join('comments','posts.id','=','comments.post_id')->get();
        print_r($post);
    }

     public function leftjoin()
    {
        $post=DB::table('posts')->leftjoin('comments','posts.id','=','comments.post_id')->get();
        print_r($post);
    }

      public function rightjoin()
    {
        $post=DB::table('posts')->rightjoin('comments','posts.id','=','comments.post_id')->get();
        print_r($post);
    }

       public function crossjoin()
    {
        $post=DB::table('posts')->crossjoin('comments')->get();
        print_r($post);
    }

}
