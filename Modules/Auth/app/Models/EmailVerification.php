<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Auth\Database\Factories\EmailVerificationFactory;

    
class EmailVerification extends Model
{
    // use HasFactory;
    protected $fillable = [
        'email', 'code', 'expires_at'
    ];

    protected $dates = ['expires_at'];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);

    //     }

}
