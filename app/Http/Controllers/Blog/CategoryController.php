<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\BlogCategoryCollection;
use App\Http\Resources\Categories\BlogCategoryResource;
use App\Http\Resources\Posts\BlogPostCollection;
use Inertia\Inertia;
use Inertia\Response;
use Joaoolival\LaravelBlogEngine\Facades\Blog;

class CategoryController extends Controller
{
    /**
     * Display the blog categories listing.
     */
    public function index(): Response
    {
        $categories = Blog::getAllCategories();

        return Inertia::render('blog/categories/Index', [
            'categories' => new BlogCategoryCollection($categories),
        ]);
    }

    /**
     * Display posts for a specific category.
     */
    public function show(string $slug): Response
    {
        $result = Blog::getCategoryWithPosts($slug, perPage: 12);

        return Inertia::render('blog/categories/Show', [
            'category' => new BlogCategoryResource($result['category']),
            'posts' => new BlogPostCollection($result['posts']),
        ]);
    }
}
