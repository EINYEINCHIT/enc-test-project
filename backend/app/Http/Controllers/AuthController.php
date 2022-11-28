<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $return = array();

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $return['data'] = $user;
        $return['error'] = false;
        $return['msg'] = 'Register Successful';
        return $return;
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'error' => true,
                'message' => 'Invalid Credentials!'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 5*24); // 60*24 = 1 day

        return response([
            'error' => false,
            'message' => 'Login Successful',
            'data' => array(
                'token' => $token,
                'name' => $user->name,
                'email' => $user->email
            )
        ])->withCookie($cookie);
       
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'error' => false,
            'message' => 'Logout Successful'
        ])->withCookie($cookie);
    }

}
