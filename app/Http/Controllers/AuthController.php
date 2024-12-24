<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'name'=> 'required|string',
            'password'=> 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/'
        ]);

        User::create([
            'name' => $validate['name'],
            'password' => Hash::make($validate['password']),
        ]);

        return response()->json([
            'success'=> true,
            'message'=> 'registered'
        ], 201);
        
    }
}
