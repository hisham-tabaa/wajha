<?php

namespace Modules\System\Http\Controllers\API\Role;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermission;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Modules\System\Http\Requests\Role\AddRoleRequest;
use Modules\System\Http\Requests\Role\UpdateRoleRequest;
use Modules\System\Services\Role\IRoleService;
use Modules\System\Transformers\Role\MyRoleResource;
use Modules\System\Transformers\Role\RoleCollection;
use Modules\System\Transformers\Role\RoleResource;

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

        $this->middleware(CheckPermission::class.':read_all_roles', ['only' => ['index', 'show']]);
        $this->middleware(CheckPermission::class.':create_role', ['only' => ['store']]);
        $this->middleware(CheckPermission::class.':update_role', ['only' => ['update']]);
        $this->middleware(CheckPermission::class.':delete_role', ['only' => ['destroy']]);
        // $this->middleware(CheckPermission::class . ':read_my_role', ['only' => ['showMyRole']]);
    }

    /**
     * Summary of index
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
     *
     * @param  mixed  $id
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
     *
     * @param  mixed  $id
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
     *
     * @param  mixed  $id
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
