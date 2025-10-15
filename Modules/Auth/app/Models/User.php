<?php

namespace Modules\Auth\Models;

use App\Models\Nationalty;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use App\Services\BaseModelInterface;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Concerns\BaseFilterable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements BaseModelInterface
{   use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    use Notifiable;
    use SoftDeletes;
    use BaseFilterable;


    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'gender',
        'role_id',
        'email',
        'password',
        'last_sign_in_at',
        'nationalty_id',
        'birthday',
        'phone',
        'confirmed_at',
        'google_id',
        'is_choiced_account',
    ];

    public function getAllowColumnsFilter(): array
    {
        return [
            'first_name',
            'last_name',
            'avatar',
            'gender',
            'role_id',
            'email',
            'password',
            'last_sign_in_at',
            'nationalty_id',
            'birthday',
            'phone',
            'confirmed_at',
        ];
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birthday' => 'date',
        'last_sign_in_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Get the role assigned to the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the nationality of the user.
     */
    public function nationality()
    {
        return $this->belongsTo(Nationalty::class, 'nationalty_id');
    }
}
