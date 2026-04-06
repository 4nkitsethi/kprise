<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Corcel\Model\Post;

class PostController extends Controller
{
    //
    public function blogs()
    {
        // $posts = Post::type('post')
        //     ->status('publish')
        //     ->taxonomy('category', 'Articles')
        //     ->latest()
        //     ->get();

            

        // $wp_posts = $posts->map(function ($post) {
        //     return [
        //         'title' => $post->title,
        //         'slug' => $post->slug,
        //         'image' => $post->thumbnail?->guid,
        //         'content' => strip_tags(html_entity_decode($post->post_content)),
        //     ];
        // });

        $wp_posts = Post::type('post')
            ->status('publish')
            ->taxonomy('category', 'Articles')
            ->latest()
            ->get()
            ->map(function ($post) {
                return [
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'image' => $post->thumbnail?->guid,
                    'content' => $post->post_content, // HTML content ko as it is pass kar rahe hain
                ];
            });

            

        return view('pages.blog', ['posts' => $wp_posts]);
    }

    public function blogDetail($slug)
    {
        $post = \Corcel\Model\Post::where('post_name', $slug)->firstOrFail();   
        return view('pages.blog-detail', ['post' => $post]);
    }   
}
