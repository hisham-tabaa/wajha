<?php

namespace Modules\System\Http\Controllers\API\Permission;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermission;
use Symfony\Component\HttpFoundation\Response;
use Modules\System\Services\Permission\IPermissionService;
use Modules\System\Http\Requests\Permission\PermissionRequest;
use Modules\System\Transformers\Permission\PermissionResource;
use Modules\System\Transformers\Permission\PermissionCollection;

/**
 * Summary of PermissionController
 */
class PermissionController extends Controller
{
    private IPermissionService $Permission_service;

    public function __construct(IPermissionService $Permission_service)
    {
        $this->Permission_service = $Permission_service;
        $this->middleware(CheckPermission::class . ':read_all_roles', ['only' => ['index']]);
    }

    /**
     * Summary of index
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        [$status, $data, $code, $message] = $this->Permission_service->list();
        return $status ?
            $this->successResponse(new PermissionCollection($data), $code, $message)
            : $this->errorResponse([], $code, $message);
    }


    /**
     * Summary of show
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        [$status, $data, $code, $message] =  $this->Permission_service->get($id);
        return $status ?
            $this->successResponse(new PermissionResource($data), $code, $message)
            : $this->errorResponse([], $code, $message);
    }

    /**
     * Summary of update
     * @param \Modules\System\Http\Requests\Permission\PermissionRequest $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PermissionRequest $request, $id)
    {
        [$status, $data, $code, $message] =  $this->Permission_service->update($id, $request->validated());
        return $status ?
            $this->successResponse(new PermissionResource($data), $code, $message)
            : $this->errorResponse([], $code, $message);
    }
}
