<?php

namespace App\Http\Controllers;

use App\Helpers\AuthorizeCusTrait;
use Modules\RealEstate\Models\RealEstate;

class AwadTestController extends Controller
{
    use AuthorizeCusTrait;

    public function index()
    {
        $realEstate = RealEstate::findOrFail(1);
        $result = [];
        // هنا تمرر الكائن، وليس الكلاس
        [$status,$data,$code,$message] = $this->authorizeArray('viewAny', RealEstate::class);
        $result['viewAny'] = ['status' => $status, 'data' => $data, 'code' => $code, 'message' => $message];

        [$status,$data,$code,$message] = $this->authorizeArray('viewAnyMy', RealEstate::class);
        $result['viewAnyMy'] = ['status' => $status, 'data' => $data, 'code' => $code, 'message' => $message];

        [$status,$data,$code,$message] = $this->authorizeArray('view', $realEstate);
        $result['view'] = ['status' => $status, 'data' => $data, 'code' => $code, 'message' => $message];

        [$status,$data,$code,$message] = $this->authorizeArray('viewMy', $realEstate);
        $result['viewMy'] = ['status' => $status, 'data' => $data, 'code' => $code, 'message' => $message];

        [$status,$data,$code,$message] = $this->authorizeArray('create', RealEstate::class);
        $result['create'] = ['status' => $status, 'data' => $data, 'code' => $code, 'message' => $message];

        [$status,$data,$code,$message] = $this->authorizeArray('update', $realEstate);
        $result['update'] = ['status' => $status, 'data' => $data, 'code' => $code, 'message' => $message];

        [$status,$data,$code,$message] = $this->authorizeArray('delete', $realEstate);
        $result['delete'] = ['status' => $status, 'data' => $data, 'code' => $code, 'message' => $message];

        return response()->json($result);
    }
}
