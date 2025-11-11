<?php

namespace Modules\RealEstate\Models;

use App\Models\BaseModel;
use Modules\Auth\App\Models\User;
use Modules\RealEstate\Models\Feature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Modules\RealEstate\Database\Factories\RealEstateFactory;

class RealEstate extends BaseModel
{
    use HasFactory;

    protected $table = 'real_estates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'publisher',
        'offer_type',
        'main_address',
        'lat',
        'lan',
        'price',
        'payment_type',
        'rant_type',
        'rate_allowed_for',
        'city',
        'space',
        'brushes_status',
        'facade',
        'type',
        'number_of_rooms',
        'number_of_bathrooms',
        'floor',
        'description',
    ];
    public function getAllowColumnsFilter(): array
    {
        return [];
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'lat' => 'decimal:10',
        'lan' => 'decimal:10',
        'price' => 'decimal:2',
        'space' => 'decimal:2',
        'number_of_rooms' => 'integer',
        'number_of_bathrooms' => 'integer',
        'floor' => 'integer',
    ];

    /**
     * Relationship: RealEstate belongs to a user (owner)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'real_estate_features')
            ->withTimestamps();
    }
}
