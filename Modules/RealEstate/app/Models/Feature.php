<?php

namespace Modules\RealEstate\Models;

use App\Models\BaseModel;
use Modules\Auth\App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\RealEstate\Models\RealEstate;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Modules\RealEstate\Database\Factories\RealEstateFactory;

class Feature extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'type',
    ];
      public function getAllowColumnsFilter(): array{
        return [];
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => 'string',
    ];

    /**
     * Get the real estates that have this feature.
     */
    public function realEstates(): BelongsToMany
    {
        return $this->belongsToMany(RealEstate::class, 'real_estate_features')
                    ->withTimestamps();
    }

    /**
     * Scope a query to only include main features.
     */
    public function scopeMain($query)
    {
        return $query->where('type', 'main');
    }

    /**
     * Scope a query to only include other features.
     */
    public function scopeOther($query)
    {
        return $query->where('type', 'other');
    }

    /**
     * Scope a query to search features by name (Arabic or English).
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('name_ar', 'LIKE', "%{$search}%")
                    ->orWhere('name_en', 'LIKE', "%{$search}%");
    }

    /**
     * Get the feature name based on current locale.
     */
    public function getNameAttribute(): string
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }

    /**
     * Check if the feature is of main type.
     */
    public function isMain(): bool
    {
        return $this->type === 'main';
    }

    /**
     * Check if the feature is of other type.
     */
    public function isOther(): bool
    {
        return $this->type === 'other';
    }

    /**
     * Get features grouped by type.
     */
    public static function getGroupedByType(): array
    {
        return [
            'main' => self::main()->get(),
            'other' => self::other()->get(),
        ];
    }

    /**
     * Get feature names for forms (for select dropdowns).
     */
    public static function getForSelect(): array
    {
        return self::all()->mapWithKeys(function ($feature) {
            return [$feature->id => $feature->name];
        })->toArray();
    }

    /**
     * Get feature names grouped by type for forms.
     */
    public static function getGroupedForSelect(): array
    {
        return [
            'main' => self::main()->get()->mapWithKeys(function ($feature) {
                return [$feature->id => $feature->name];
            })->toArray(),
            'other' => self::other()->get()->mapWithKeys(function ($feature) {
                return [$feature->id => $feature->name];
            })->toArray(),
        ];
    }
}
