<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 *
 * APIs for managing user authentication
 */
class authController extends Controller
{
    /**
     * Login a user
     *
     * Authenticate a user with their email and password, and return an access token.
     *
     * @bodyParam email string required The email address of the user. Example: user@example.com
     * @bodyParam password string required The password of the user. Example: password123
     *
     * @response 200 {
     *  "access_token": "abcdefg123456",
     *  "token_type": "bearer",
     *  "expires_at": "2024-11-23 00:00:00",
     *  "expires_in": "30 days, 0 hours, 0 minutes, 0 seconds",
     *  "user": {
     *    "id": 1,
     *    "name": "John Doe",
     *    "email": "user@example.com"
     *  }
     * }
     * @response 401 {
     *  "error": "Invalid credentials"
     * }
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $tokenResult = Auth::user()->createToken('PassportAuth');
            $accessToken = $tokenResult->accessToken;
            $expiresAt = $tokenResult->token->expires_at;
            $expiresIn = Carbon::parse($expiresAt)->diff(now())->format('%d days, %h hours, %i minutes, %s seconds');

            return $this->respondWithToken([
                'token' => $accessToken,
                'user' => User::find(Auth()->id())->with("role")->first(),
                'expires_at' => $expiresAt,
                'expires_in' => $expiresIn,
            ]);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    public function register(Request $request){

        $request->validate([
            "username" => "required",
            "email" => "required|email|unique:users,email",
            "role" => "required",
            "password" => "required"
        ]);

        $data = User::create([
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            "role_id" => $request->role,
        ]);
        return response()->json($data);
    }

    /**
     * Get Authenticated User
     *
     * Retrieve details of the currently authenticated user.
     *
     * @response 200 {
     *  "id": 1,
     *  "name": "John Doe",
     *  "email": "user@example.com"
     * }
     * @response 401 {
     *  "error": "Unauthorized"
     * }
     */
    public function me()
    {
        $user = auth()->user()->with("role")->first();
        if ($user) {
            return response()->json($user);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Logout a user
     *
     * Revoke the current user's access token and log them out.
     *
     * @response 200 {
     *  "message": "Successfully logged out"
     * }
     * @response 401 {
     *  "error": "Unauthorized"
     * }
     */
    public function logout(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $request->user()->token()->revoke();
            return response()->json(['message' => 'Successfully logged out']);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Refresh Token
     *
     * Revoke the current token and issue a new one.
     *
     * @response 200 {
     *  "access_token": "newtoken123456",
     *  "token_type": "bearer",
     *  "expires_at": "2024-11-23 00:00:00",
     *  "expires_in": "30 days, 0 hours, 0 minutes, 0 seconds",
     *  "user": {
     *    "id": 1,
     *    "name": "John Doe",
     *    "email": "user@example.com"
     *  }
     * }
     * @response 401 {
     *  "error": "Unauthorized"
     * }
     */
    public function refresh(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $user->tokens()->where('id', $user->token()->id)->delete();
            $tokenResult = $user->createToken('PassportAuth');
            $accessToken = $tokenResult->accessToken;
            $expiresAt = $tokenResult->token->expires_at;
            $expiresIn = Carbon::parse($expiresAt)->diff(now())->format('%d days, %h hours, %i minutes, %s seconds');

            return $this->respondWithToken([
                'token' => $accessToken,
                'user' => $user,
                'expires_at' => $expiresAt,
                'expires_in' => $expiresIn,
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Format response with token
     *
     * Internal method to format the token response.
     */
    private function respondWithToken($response)
    {
        return response()->json([
            "access_token" => $response["token"],
            "token_type" => "bearer",
            "expires_at" => $response["expires_at"]->toDateTimeString(),
            "expires_in" => $response["expires_in"],
            "user" => $response["user"]
        ]);
    }
}
