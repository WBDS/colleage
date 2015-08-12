<?php

namespace App\Http\Controllers;

use App\MyValidator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Illuminate\Support\Facades\Hash;
use Log;


class TokenAuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }

    public function register(Request $request){
        $input = $request->all();
        $v = MyValidator::validateRegisterRequest($input);
        if ($v->fails()){
            return new jsonResponse([
                'message' => $v->errors()->first(),
            ], 403);
        }
        $user = new User();
        $user->email = $input['email'];
        $user->name = $input['name'];
        $user->username = $input['username'];
        $user->password = Hash::make($input['password']);
        $user->mobile_no = $input['mobile_no'];
        $user->confirmed = 0;
        $user->confirmation_code = "";
        $user->pin_no = $input['pin_no'];
        $insert = $user->save();
        if ($insert){
            return new jsonResponse([
                'message' => 'Registered successfully.',
            ], 201);
        } else {
            return new jsonResponse([
                'message' => 'Register failed.',
            ], 403);
        }
    }

    public function resetPasswordRequest(){
        $input = $request->all();
    }
}
