<?php

namespace App\Models\Concerns;

use App\Services\BaseFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait BaseFilterable
{
    public static function filter(Request $request): Builder
    {
        return (new BaseFilter(static::class, $request))->execute();
    }
}
