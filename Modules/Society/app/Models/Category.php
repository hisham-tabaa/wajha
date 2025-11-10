<?php

namespace Modules\Society\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'description',
        'icon',
        'color',
        'sort_order',
        'is_active',
        'parent_id'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Get the parent category
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the child categories
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('sort_order');
    }

    /**
     * Get only active child categories
     */
    public function activeChildren(): HasMany
    {
        return $this->children()->where('is_active', true);
    }

    /**
     * Scope to get only root categories (no parent)
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope to get only active categories
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name_ar');
    }

    /**
     * Get the display name (Arabic by default)
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name_ar;
    }

    /**
     * Check if category has children
     */
    public function getHasChildrenAttribute(): bool
    {
        return $this->children()->exists();
    }

    /**
     * Get all descendants recursively
     */
    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    /**
     * Get breadcrumb trail
     */
    public function getBreadcrumbAttribute(): array
    {
        $breadcrumb = [];
        $category = $this;

        while ($category) {
            $breadcrumb[] = $category;
            $category = $category->parent;
        }

        return array_reverse($breadcrumb);
    }
}
