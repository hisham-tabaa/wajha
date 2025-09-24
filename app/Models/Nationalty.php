<?php

namespace App\Models;

use App\Models\BaseModel;
use Modules\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Nationalty
 *
 * @package Modules\Auth\Models
 *
 * @property int    $id
 * @property string $name_ar
 * @property string $name_en
 */
class Nationalty extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nationalties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_ar',
        'name_en',
    ];
    public function getAllowColumnsFilter(): array
    {
        return ['name_ar', 'name_en'];
    }
    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Users belonging to this nationality.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'nationalty_id');
    }
}
