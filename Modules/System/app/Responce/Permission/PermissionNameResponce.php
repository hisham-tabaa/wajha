<?php

namespace Modules\System\Responce\Permission;

class PermissionNameResponce
{

    public array $data = [];


    public function __construct(array $array)
    {
        foreach ($array as $item) {
            $this->data[] = $item->name;
        }
    }
}

