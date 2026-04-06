<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Corcel\Model\Post;

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

        

        $posts = Post::type('post')
            ->status('publish')
            ->taxonomy('category', 'Articles')
            ->latest()
            ->get()
            ->map(function ($post) {

                return [
                    'slug'         => $post->slug,
                    'title'        => $post->title,

                    // excerpt (auto trim content)
                    'excerpt'      => Str::limit(strip_tags($post->post_content), 150),

                    // category name
                    'category'     => optional($post->taxonomies->first())->term->name,

                    // author name
                    'author'       => optional($post->author)->display_name ?? 'Admin',

                    // published date
                    'published_at' => optional($post->post_date)->format('Y-m-d'),

                    // read time (approx: 200 words/min)
                    'read_time'    => ceil(str_word_count(strip_tags($post->post_content)) / 200),

                    // featured image
                    'image'        => $post->thumbnail,

                    // alt text (fallback)
                    'image_alt'    => $post->title,
                ];
            });

        // Example static posts — replace with DB query in production
        // $posts = collect([
        //     [
        //         'slug'         => 'how-agentic-ai-is-changing-corporate-training',
        //         'title'        => 'How Agentic AI Is Changing Corporate Training Forever',
        //         'excerpt'      => 'Agentic AI doesn\'t just assist — it acts. Here\'s how it\'s reshaping the role of L&D teams and eliminating the busywork of LMS administration.',
        //         'category'     => 'AI & Technology',
        //         'author'       => 'Kprise Team',
        //         'published_at' => '2025-11-15',
        //         'read_time'    => 6,
        //         'image'        => asset('assets/images/blog/agentic-ai-training.jpg'),
        //         'image_alt'    => 'Agentic AI in corporate training',
        //     ],
        //     [
        //         'slug'         => 'credit-based-lms-pricing-explained',
        //         'title'        => 'Credit-Based LMS Pricing Explained — Is It Right for Your Organisation?',
        //         'excerpt'      => 'Per-user pricing punishes growth. Credit-based pricing rewards efficiency. We break down how each model works and which saves you more money.',
        //         'category'     => 'LMS Strategy',
        //         'author'       => 'Kprise Team',
        //         'published_at' => '2025-10-28',
        //         'read_time'    => 5,
        //         'image'        => asset('assets/images/blog/lms-pricing.jpg'),
        //         'image_alt'    => 'LMS pricing comparison',
        //     ],
        //     [
        //         'slug'         => 'onboarding-training-best-practices',
        //         'title'        => '7 Onboarding Training Best Practices That Actually Reduce Ramp Time',
        //         'excerpt'      => 'New hire onboarding is your first impression as an employer. Get it right with these seven proven strategies that leading L&D teams use today.',
        //         'category'     => 'Best Practices',
        //         'author'       => 'Kprise Team',
        //         'published_at' => '2025-10-10',
        //         'read_time'    => 8,
        //         'image'        => asset('assets/images/blog/onboarding-training.jpg'),
        //         'image_alt'    => 'Employee onboarding training',
        //     ],
        // ]);

        // Filter by category if requested
        if ($request->filled('category')) {
            $posts = $posts->filter(fn($p) =>
                str($p['category'])->slug()->is($request->category)
            );
        }

        $categories = [
            ['name' => 'Articles', 'slug' => 'articles']
        ];

        return view('pages.blog.index', compact('seo', 'posts', 'categories'));
    }

    /**
     * Single blog post.
     * Replace static lookup with: Post::where('slug', $slug)->firstOrFail()
     */
    public function show(string $slug): View
    {

        // $post = \Corcel\Model\Post::where('post_name', $slug)->firstOrFail();   
        // return view('pages.blog-detail', ['post' => $post]);
        // // Example static post — replace with DB lookup
        // $post = [
        //     'slug'         => $slug,
        //     'title'        => 'How Agentic AI Is Changing Corporate Training Forever',
        //     'excerpt'      => 'Agentic AI doesn\'t just assist — it acts. Here\'s how it\'s reshaping the role of L&D teams.',
        //     'category'     => 'AI & Technology',
        //     'author'       => 'Kprise Team',
        //     'published_at' => '2025-11-15',
        //     'updated_at'   => '2025-11-20',
        //     'read_time'    => 6,
        //     'image'        => asset('assets/images/blog/agentic-ai-training.jpg'),
        //     'image_alt'    => 'Agentic AI in corporate training',
        //     'content'      => '<p>Placeholder content — replace with your CMS or database content.</p>',
        // ];

//         use Corcel\Model\Post;
// use Illuminate\Support\Str;

$post = Post::type('post')
    ->status('publish')
    ->where('post_name', $slug) // slug match
    ->first();

if (!$post) {
    abort(404);
}

$post = [
    'slug'         => $post->slug,
    'title'        => $post->title,

    'excerpt'      => Str::limit(strip_tags($post->post_content), 150),

    'category'     => optional(
        $post->taxonomies->where('taxonomy', 'category')->first()
    )->term->name,

    'author'       => optional($post->author)->display_name ?? 'Admin',

    'published_at' => optional($post->post_date)->format('Y-m-d'),

    'updated_at'   => optional($post->post_modified)->format('Y-m-d'),

    'read_time'    => ceil(str_word_count(strip_tags($post->post_content)) / 200),

    'image'        => optional($post->thumbnail)->guid,

    'image_alt'    => $post->title,

    // IMPORTANT: render HTML as it is
    'content'      => $post->post_content,
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
