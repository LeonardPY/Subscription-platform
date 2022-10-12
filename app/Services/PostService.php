<?php

namespace App\Services;

use App\Jobs\Post\PostSendEmailJob;
use App\Models\Post;
use App\Models\WebSite;
use Illuminate\Http\Request;

class PostService
{

    public function createPost(Request $request)
    {
        $post = Post::where([
            'title' => $request->title,
            'website_id' => $request->website_id
        ])->first();
        if ($post) {
            return 'Post with this title already exists';
        }
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'website_id' => $request->website_id,
        ]);
        $website = WebSite::find($post->website_id);
        foreach ($website->subscribers as $subscriber) {
            $email = $subscriber->email;
            dispatch(new PostSendEmailJob($email, $post));
        }
        return $post;
    }

    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);
        if ($post) {
            return $post->update([
                'title' => $request->title,
                'description' => $request->description
            ]);
        }
        return 'Post Not found or already update';
    }

    public function deletePost(Request $request)
    {
        $post = Post::where(['id' => $request->id])->first();
        if ($post) {
            return $post->delete();;
        }
        return 'Post Not found or already deleted';
    }

}
