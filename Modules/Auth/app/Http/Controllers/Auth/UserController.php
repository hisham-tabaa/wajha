<?php

namespace Modules\Auth\Http\Controllers\Auth;

use App\Http\Middleware\CheckPermission;
use Modules\Auth\Services\GetRole\UserService;
use Modules\Auth\Services\GetRole\UserInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Auth\Transformers\UserResource\UserResource;
use App\Http\Controllers\Controller;
use Modules\System\Transformers\Role\RoleCollection;
use Modules\Auth\Http\Requests\ChangeUserRoleRequest;


class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware(CheckPermission::class . ':choice_role', ['only' => ['getRoles', 'changeRole']]);
    }

    public function getRoles(): JsonResponse
    {
        [$status, $data, $code, $message] = $this->userService->getRoles();

        return $status
            ? $this->successResponse(new RoleCollection($data), $code, $message)
            : $this->errorResponse([], $code, $message);
    }
    public function changeRole(ChangeUserRoleRequest $request)
    {


        [$status, $data, $code, $message] = $this->userService->changeUserRole($request);

        return $status
            ? $this->successResponse($data, $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
