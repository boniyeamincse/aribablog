<?php

namespace App\Modules\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Modules\Blog\Models\Post;

use App\Modules\SEO\Models\SeoMetadata;

class Tag extends Model
{
    /**
     * Get the SEO metadata for the tag.
     */
    public function seo()
    {
        return $this->morphOne(SeoMetadata::class, 'seoble');
    }

    protected $fillable = ['name', 'slug'];

    /**
     * Get the posts associated with the tag.
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
