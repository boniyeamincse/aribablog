<?php

namespace App\Modules\SEO\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\SEO\Services\SitemapService;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    protected $sitemapService;

    public function __construct(SitemapService $sitemapService)
    {
        $this->sitemapService = $sitemapService;
    }

    /**
     * Render the sitemap.xml.
     */
    public function index(): Response
    {
        $content = $this->sitemapService->generate();

        return response($content, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
