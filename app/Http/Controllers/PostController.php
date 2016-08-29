<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;

class PostController extends Controller
{

    public function myPost(Request $request)
    {
    	$posts = Post::paginate(5);

    	if ($request->ajax()) {
    		$view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }

    	return view('my-post.index',compact('posts'));
    }

}