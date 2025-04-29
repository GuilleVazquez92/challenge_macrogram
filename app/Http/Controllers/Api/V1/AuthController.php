<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthService $auth;

    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    public function register(RegisterRequest $request)
    {
        $result = $this->auth->register($request->validated());

        return response()->json($result);
    }

    public function login(LoginRequest $request)
    {
        $result = $this->auth->login($request->validated());

        if (!$result) {
            return response()->json(['message' => 'Incorrect credentials'], 401);
        }

        return response()->json($result);
    }

    public function logout(Request $request)
    {
        $this->auth->logout($request->user());

        return response()->json(['message' => 'Session closed successfully']);
    }
}