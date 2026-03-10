<?php

namespace App\Modules\SEO\Services;

use App\Modules\Blog\Models\Post;
use App\Modules\Categories\Models\Category;
use Illuminate\Support\Facades\URL;

class SitemapService
{
    /**
     * Generate XML sitemap content.
     */
    public function generate(): string
    {
        $urls = [];

        // Add Home
        $urls[] = $this->formatUrl(URL::to('/'), now()->toAtomString(), 'weekly', '1.0');

        // Add Posts
        $posts = Post::where('status', 'published')->get();
        foreach ($posts as $post) {
            $urls[] = $this->formatUrl(URL::route('blog.show', $post->slug), $post->updated_at->toAtomString(), 'monthly', '0.8');
        }

        // Add Categories
        $categories = Category::all();
        foreach ($categories as $category) {
            $urls[] = $this->formatUrl(URL::route('category.show', $category->slug), $category->updated_at->toAtomString(), 'weekly', '0.6');
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml .= implode('', $urls);
        $xml .= '</urlset>';

        return $xml;
    }

    private function formatUrl($loc, $lastmod, $changefreq, $priority): string
    {
        return "<url>
            <loc>{$loc}</loc>
            <lastmod>{$lastmod}</lastmod>
            <changefreq>{$changefreq}</changefreq>
            <priority>{$priority}</priority>
        </url>";
    }
}
