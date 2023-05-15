<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\User\V1\UserService;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @param UserService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request, UserService $service)
    {
        $res = $service->store($request);

        return response()->json([
            'status' => $res['status'],
            'data' => $res['data'],
            'message' => $res['message'],
        ], $res['code']);
    }
}
