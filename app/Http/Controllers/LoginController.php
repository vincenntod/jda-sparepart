<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'status' => 'Login Successfull'
            ],200);
        }

        return response()->json([
            'status' => 'Login Failed'
        ],401);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'status' => 'Logout Successfull'
        ],200);
    }
    public function viewRegister()
    {
        return view('register');
    }

    public function register(Request $request){
        try{
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return response()->json([
                'message' => 'success created data'
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to create data: ' . $e->getMessage()
            ], 500);
        }
    }

    // public function getRole($){
    //     $result = DB::table('users')->get();
    //     return 
    // }
}
