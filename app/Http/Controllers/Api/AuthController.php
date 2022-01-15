<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'username'  => 'required|string|email|max:255',
                'password'  => 'required|string|min:6|max:255'
            ],
            [
                'username.required'=>'Username is required.',
                'username.string'=>'Username must be characters',
                'username.email'=>'Username must be email',
                'username.max'=>'Username maximum 255 characters needed',
                'password.required'=>'Password is required.',
                'password.string'=>'Password must be characters',
                'password.min'=>'Password minimum 6 characters needed',
                'password.max'=>'Password maximum 255 characters needed',
            ]
        );
        if($validation->passes()) {
            $user = User::where('email', $request->username)->first();
            if(!empty($user)) {
                if(Hash::check($request->password, $user->password)) {
                    return response()->json([
                        'message' => 'Login successfully',
                        'user_id' => $user->id,
                        'code' => 200
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Username & password not matched',
                        'user_id' => null,
                        'code' => 403
                    ]);
                }
            } else {
                return response()->json([
                    'message'  => 'Username not found',
                    'user_id' => null,
                    'code' => 401
                ]);
            }
        } else {
            return response()->json([
                'message'  => $validation->errors()->all(),
                'user_id' => null,
                'code' => 404
            ]);
        }
//        return json_encode($request->all());
    }
}
