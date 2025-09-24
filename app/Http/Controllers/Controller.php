<?php

namespace App\Http\Controllers;

use App\Response\AppResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

/**
 * Base Controller
 * Provides unified success and error JSON responses for all APIs.
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Return a standardized success response.
     *
     * @param mixed       $data        Response payload
     * @param int         $statusCode  HTTP status code (default: 200)
     * @param string      $message     Success message
     *
     * @return JsonResponse
     */
    protected function successResponse($data, int $statusCode = 200, string $message = 'It done successfully'): JsonResponse
    {
        return response()->json(
            new AppResponse('success', $data, $statusCode, $message),
            $statusCode
        );
    }

    /**
     * Return a standardized error response.
     *
     * @param mixed       $data         Error details or null
     * @param int         $statusCode   HTTP status code (default: 400)
     * @param string      $errorMessage Error message
     *
     * @return JsonResponse
     */
    protected function errorResponse($data, int $statusCode = 400, string $errorMessage = 'error'): JsonResponse
    {
        return response()->json(
            new AppResponse('failed', $data, $statusCode, $errorMessage),
            $statusCode
        );
    }
}
