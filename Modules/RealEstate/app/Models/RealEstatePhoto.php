<?php

namespace Modules\RealEstate\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\RealEstate\Database\Factories\RealEstateFactory;

class RealEstatePhoto extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'real_estate_id',
        'photo_path',
        'is_main',
    ];

    public function getAllowColumnsFilter(): array
    {
        return [];
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_main' => 'boolean',
    ];

    /**
     * Get the real estate that owns the photo.
     */
    public function realEstate(): BelongsTo
    {
        return $this->belongsTo(RealEstate::class);
    }

    /**
     * Scope a query to only include main photos.
     */
    public function scopeMain($query)
    {
        return $query->where('is_main', true);
    }

    /**
     * Scope a query to only include non-main photos.
     */
    public function scopeNotMain($query)
    {
        return $query->where('is_main', false);
    }

    /**
     * Get the full URL for the photo.
     */
    // public function getPhotoUrlAttribute(): string
    // {
    //     if (filter_var($this->photo_path, FILTER_VALIDATE_URL)) {
    //         return $this->photo_path;
    //     }

    //     return asset('storage/' . $this->photo_path);
    // }

    /**
     * Set this photo as the main photo for the real estate.
     */
    public function setAsMain(): void
    {
        // Remove main status from all other photos of this real estate
        self::where('real_estate_id', $this->real_estate_id)
            ->where('id', '!=', $this->id)
            ->update(['is_main' => false]);

        // Set this photo as main
        $this->update(['is_main' => true]);
    }

    /**
     * Check if this is the main photo.
     */
    public function isMain(): bool
    {
        return $this->is_main;
    }

    /**
     * Boot method for model events.
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically set the first photo as main if no main photo exists
        static::creating(function ($photo) {
            if ($photo->is_main) {
                // If this photo is being set as main, update others
                self::where('real_estate_id', $photo->real_estate_id)
                    ->update(['is_main' => false]);
            }
        });

        // Ensure only one main photo exists per real estate
        static::updated(function ($photo) {
            if ($photo->is_main) {
                self::where('real_estate_id', $photo->real_estate_id)
                    ->where('id', '!=', $photo->id)
                    ->update(['is_main' => false]);
            }
        });
    }
}
