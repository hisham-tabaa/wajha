<?php

namespace Modules\Auth\Responce\Permission;

class PermissionResponce
{
    public array $data = [];

    public function __construct(array $array)
    {
        $i = 0;
        foreach ($array as $item) {
            $this->data[$i]['id'] = $item->id;
            $this->data[$i]['name'] = $item->name;
            $this->data[$i]['name_ar'] = $item->name_ar;
            $this->data[$i]['name_en'] = $item->name_en;
            $this->data[$i]['guard_name'] = $item->guard_name;
            $i++;
        }
    }
}
