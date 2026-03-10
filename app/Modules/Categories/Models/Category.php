<?php

namespace App\Modules\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Modules\Blog\Models\Post;

use App\Modules\SEO\Models\SeoMetadata;

class Category extends Model
{
    /**
     * Get the SEO metadata for the category.
     */
    public function seo()
    {
        return $this->morphOne(SeoMetadata::class, 'seoble');
    }

    protected $fillable = ['name', 'slug', 'parent_id'];

    /**
     * Get the parent category.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the subcategories.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Get the posts for the category.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
