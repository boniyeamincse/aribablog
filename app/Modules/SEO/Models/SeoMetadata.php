<?php

namespace App\Modules\SEO\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SeoMetadata extends Model
{
    protected $table = 'seo_metadata';

    protected $fillable = [
        'model_type',
        'model_id',
        'title',
        'description',
        'keywords',
        'og_image',
        'canonical_url',
    ];

    /**
     * Get the parent model (Post, Category, Tag, etc).
     */
    public function seoble(): MorphTo
    {
        return $this->morphTo();
    }
}
