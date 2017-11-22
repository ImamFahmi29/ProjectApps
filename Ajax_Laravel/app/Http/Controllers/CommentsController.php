<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Comment, App\Article;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Redirect;
use Response;

class CommentsController extends Controller
{

	protected $rules =
    [
        'user' => 'required|email',
        'content' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
        // 'user' => 'required|email',
        // 'comment' => 'required'
    ];
    public function store(Request $request)
	{
		$validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
	        $comment = new Comment();
			$comment->article_id = $request->article_id;
			$comment->content = $request->content;
			$comment->user = $request->user;
			$comment->save();
			return response()->json($comment);
        }
		}
	

	public function index()
	{
		return view('welcome');
	}

	public function destroy($id)
    {
        $post = Comment::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }
}

