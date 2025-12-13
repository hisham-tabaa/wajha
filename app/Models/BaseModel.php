<?php

namespace App\Models;

use App\Models\Concerns\BaseFilterable;
use App\Services\BaseModelInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model implements BaseModelInterface
{
    use BaseFilterable;
}
