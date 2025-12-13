<?php

namespace App\Models;


use App\Services\BaseModelInterface;
use App\Models\Concerns\BaseFilterable;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model implements BaseModelInterface
{
    use BaseFilterable;
}
