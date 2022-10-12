<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\DelatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Services\PostService;



class PostController extends Controller
{
    public function create(CreatePostRequest $request)
    {
        /** @var PostService $service */
        $service = resolve(PostService::class);
        return $service->createPost($request);
    }

    public function update(UpdatePostRequest $request)
    {
        /** @var PostService $service */
        $service = resolve(PostService::class);
        return $service->updatePost($request);
    }

    public function delete(DelatePostRequest $request)
    {
        /** @var PostService $service */
        $service = resolve(PostService::class);
        return $service->deletePost($request);
    }
}
