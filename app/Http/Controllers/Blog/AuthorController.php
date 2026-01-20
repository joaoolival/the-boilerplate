<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Authors\BlogAuthorCollection;
use App\Http\Resources\Authors\BlogAuthorResource;
use App\Http\Resources\Posts\BlogPostCollection;
use Inertia\Inertia;
use Inertia\Response;
use Joaoolival\LaravelBlogEngine\Facades\Blog;

class AuthorController extends Controller
{
    /**
     * Display the blog authors listing.
     */
    public function index(): Response
    {
        $authors = Blog::getAllAuthors();

        return Inertia::render('blog/authors/Index', [
            'authors' => new BlogAuthorCollection($authors),
        ]);
    }

    /**
     * Display a single author profile with their posts.
     */
    public function show(string $slug): Response
    {
        $result = Blog::getAuthorWithPosts($slug, perPage: 12);

        return Inertia::render('blog/authors/Show', [
            'author' => new BlogAuthorResource($result['author']),
            'posts' => new BlogPostCollection($result['posts']),
        ]);
    }
}
