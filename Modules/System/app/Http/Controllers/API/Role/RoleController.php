<?php

namespace Modules\System\Http\Controllers\API\Role;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckPermission;
use Modules\System\Services\Role\IRoleService;
use Symfony\Component\HttpFoundation\Response;
use Modules\System\Transformers\Role\RoleResource;
use Modules\System\Transformers\Role\MyRoleResource;
use Modules\System\Transformers\Role\RoleCollection;
use Modules\System\Http\Requests\Role\AddRoleRequest;
use Modules\System\Http\Requests\Role\UpdateRoleRequest;

/**
 * @group إدارة الأدوار
 *
 * نقاط النهاية API لإدارة الأدوار والصلاحيات
 */
class RoleController extends Controller
{
    private IRoleService $role_service;

    public function __construct(IRoleService $role_service)
    {
        $this->role_service = $role_service;

        $this->middleware(CheckPermission::class . ':read_all_roles', ['only' => ['index', 'show']]);
        $this->middleware(CheckPermission::class . ':create_role', ['only' => ['store']]);
        $this->middleware(CheckPermission::class . ':update_role', ['only' => ['update']]);
        $this->middleware(CheckPermission::class . ':delete_role', ['only' => ['destroy']]);
        // $this->middleware(CheckPermission::class . ':read_my_role', ['only' => ['showMyRole']]);
    }

    /**
     * Summary of index
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        [$status, $data, $code, $message] = $this->role_service->list();
        return $status
            ? $this->successResponse(new RoleCollection($data), $code, $message)
            : $this->errorResponse([], $code, $message);
    }

    /**
     * Summary of store
     * @param \Modules\System\Http\Requests\Role\AddRoleRequest $request
     * @return JsonResponse
     */
    public function store(AddRoleRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->role_service->create($request);
        return $status
            ? $this->successResponse(new RoleResource($data), $code, $message)
            : $this->errorResponse([], $code, $message);
    }

    /**
     * Summary of show
     * @param mixed $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->role_service->get($id);
        return $status
            ? $this->successResponse(new RoleResource($data), $code, $message)
            : $this->errorResponse([], $code, $message);
    }

    /**
     * Summary of update
     * @param \Modules\System\Http\Requests\Role\UpdateRoleRequest $request
     * @param mixed $id
     * @return JsonResponse
     */
    public function update(UpdateRoleRequest $request, $id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->role_service->update($id, $request);
        return $status
            ? $this->successResponse(new RoleResource($data), $code, $message)
            : $this->errorResponse([], $code, $message);
    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        [$status, $data, $code, $message] = $this->role_service->delete($id);
        return $status
            ? $this->successResponse([], $code, $message)
            : $this->errorResponse([], $code, $message);
    }

    /**
     * Summary of showMyRole
     * @return JsonResponse
     */
    public function showMyRole(): JsonResponse
    {
        $id = Auth::user()->role_id;
        [$status, $data, $code, $message] = $this->role_service->get($id);
        return $status
            ? $this->successResponse(new MyRoleResource($data), $code, $message)
            : $this->errorResponse([], $code, $message);
    }
}
