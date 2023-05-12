<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class PostController extends BaseController
{
    public function index()
    {
        $post = PostResource::collection(Post::get());
        return $this->sendResponse($post, 'Success Get Data Post');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validatedData->fails()) {
            return $this->sendError('Validation Error.', $validatedData->errors());
        }

        $post = new PostResource(Post::create($request->all()));
        return $this->sendResponse($post, 'Success Created Post!');
    }


    public function show(Post $post)
    {
        $post = Post::find($post->id);
        if (!$post) {
            return $this->sendError('Post Not Found!');
        }

        return $this->sendResponse(new PostResource($post), 'Success Get Data Post!');
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        if (!$post) {
            return $this->sendError('Post Not Found!');
        }

        $validatedData = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validatedData->fails()) {
            return $this->sendError('Validation Error.', $validatedData->errors());
        }

        $post = new PostResource(Post::find($post->id)->update($request->all()));
        return $this->sendResponse($post, 'Success Update Data Post');
    }


    public function destroy(Post $post)
    {
        if (!$post) {
            return $this->sendError('Post Not Found!');
        }

        $post->delete();
        return $this->sendResponse([], 'Success Delete Data Post');
    }
}
