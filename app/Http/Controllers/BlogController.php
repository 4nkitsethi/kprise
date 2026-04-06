<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Blog index — paginated list of posts.
     * Replace the static $posts array with an Eloquent query
     * once you have a Post model: Post::published()->paginate(9)
     */
    public function index(Request $request): View
    {
        $seo = [
            'title'       => 'Blog — LMS Tips, Training Insights & News | MyPass LMS',
            'description' => 'Read the latest articles on LMS best practices, AI in learning, employee training, compliance, and more from the Kprise team.',
            'canonical'   => route('blog.index'),
        ];

        // Example static posts — replace with DB query in production
        $posts = collect([
            [
                'slug'         => 'how-agentic-ai-is-changing-corporate-training',
                'title'        => 'How Agentic AI Is Changing Corporate Training Forever',
                'excerpt'      => 'Agentic AI doesn\'t just assist — it acts. Here\'s how it\'s reshaping the role of L&D teams and eliminating the busywork of LMS administration.',
                'category'     => 'AI & Technology',
                'author'       => 'Kprise Team',
                'published_at' => '2025-11-15',
                'read_time'    => 6,
                'image'        => asset('assets/images/blog/agentic-ai-training.jpg'),
                'image_alt'    => 'Agentic AI in corporate training',
            ],
            [
                'slug'         => 'credit-based-lms-pricing-explained',
                'title'        => 'Credit-Based LMS Pricing Explained — Is It Right for Your Organisation?',
                'excerpt'      => 'Per-user pricing punishes growth. Credit-based pricing rewards efficiency. We break down how each model works and which saves you more money.',
                'category'     => 'LMS Strategy',
                'author'       => 'Kprise Team',
                'published_at' => '2025-10-28',
                'read_time'    => 5,
                'image'        => asset('assets/images/blog/lms-pricing.jpg'),
                'image_alt'    => 'LMS pricing comparison',
            ],
            [
                'slug'         => 'onboarding-training-best-practices',
                'title'        => '7 Onboarding Training Best Practices That Actually Reduce Ramp Time',
                'excerpt'      => 'New hire onboarding is your first impression as an employer. Get it right with these seven proven strategies that leading L&D teams use today.',
                'category'     => 'Best Practices',
                'author'       => 'Kprise Team',
                'published_at' => '2025-10-10',
                'read_time'    => 8,
                'image'        => asset('assets/images/blog/onboarding-training.jpg'),
                'image_alt'    => 'Employee onboarding training',
            ],
        ]);

        // Filter by category if requested
        if ($request->filled('category')) {
            $posts = $posts->filter(fn($p) =>
                str($p['category'])->slug()->is($request->category)
            );
        }

        $categories = [
            ['name' => 'AI & Technology', 'slug' => 'ai-technology'],
            ['name' => 'LMS Strategy',    'slug' => 'lms-strategy'],
            ['name' => 'Best Practices',  'slug' => 'best-practices'],
            ['name' => 'Compliance',      'slug' => 'compliance'],
        ];

        return view('pages.blog.index', compact('seo', 'posts', 'categories'));
    }

    /**
     * Single blog post.
     * Replace static lookup with: Post::where('slug', $slug)->firstOrFail()
     */
    public function show(string $slug): View
    {
        // Example static post — replace with DB lookup
        $post = [
            'slug'         => $slug,
            'title'        => 'How Agentic AI Is Changing Corporate Training Forever',
            'excerpt'      => 'Agentic AI doesn\'t just assist — it acts. Here\'s how it\'s reshaping the role of L&D teams.',
            'category'     => 'AI & Technology',
            'author'       => 'Kprise Team',
            'published_at' => '2025-11-15',
            'updated_at'   => '2025-11-20',
            'read_time'    => 6,
            'image'        => asset('assets/images/blog/agentic-ai-training.jpg'),
            'image_alt'    => 'Agentic AI in corporate training',
            'content'      => '<p>Placeholder content — replace with your CMS or database content.</p>',
        ];

        $seo = [
            'title'       => $post['title'] . ' | MyPass LMS Blog',
            'description' => $post['excerpt'],
            'og_image'    => $post['image'],
            'canonical'   => route('blog.show', $slug),
        ];

        $relatedPosts = []; // Fetch from DB: Post::related($post)->take(3)->get()

        return view('pages.blog.show', compact('seo', 'post', 'relatedPosts'));
    }
}
