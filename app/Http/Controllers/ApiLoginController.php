<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\LoginResource;
use Symfony\Component\HttpFoundation\Response;

class ApiLoginController extends Controller
{
    public function index(Request $request){
        
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Unauthorized'
            ],401);
        }
        $token = $user->createToken('token-name')->plainTextToken;

        $response = [
            'user_id' => $user->id,
            'token' => $token,
            'status' => Response::HTTP_OK,
            'message' => 'Access Granted',
        ];

        // return LoginResource::collection(User::all());
        return response()->json($response, Response::HTTP_OK);
    }
}
