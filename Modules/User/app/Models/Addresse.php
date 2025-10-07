<?php

namespace Modules\User\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\User\Database\Factories\AddresseFactory;

class Addresse extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AddresseFactory
    // {
    //     // return AddresseFactory::new();
    // }

    public function getAllowColumnsFilter():array{
        return [];
    }
}
