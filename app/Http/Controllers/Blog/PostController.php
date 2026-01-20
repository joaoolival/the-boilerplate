<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\BlogPostCollection;
use App\Http\Resources\Posts\BlogPostResource;
use Inertia\Inertia;
use Inertia\Response;
use Joaoolival\LaravelBlogEngine\Facades\Blog;

class PostController extends Controller
{
    /**
     * Display the blog posts listing.
     */
    public function index(): Response
    {
        $posts = Blog::getPublishedPosts(perPage: 10);

        return Inertia::render('blog/posts/Index', [
            'posts' => new BlogPostCollection($posts),
        ]);
    }

    /**
     * Display a single blog post.
     */
    public function show(string $slug): Response
    {
        $post = Blog::getPostBySlug($slug);

        return Inertia::render('blog/posts/Show', [
            'post' => new BlogPostResource($post),
        ]);
    }
}
