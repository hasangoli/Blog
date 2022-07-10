<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SanctumController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:11',
            'password' => 'required|string|min:8|confirmed'
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            // $user->sendEmailVerificationNotification();

            return response()->json([
                'token' => $user->createToken($request->email)->plainTextToken,
                'user' => $user,
                'success' => True,
            ],Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'massage' => 'registred faild',
                'success' => False,
                $exception
            ]);
            
        }
    }

    public function getNewToken()
    {
        $user = User::where('email', 'user@user.com')->first();
        $user->tokens()->delete();
        return response()->json($user->createToken('user@user.com')->plainTextToken);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try{
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            $token = $user->createToken($request->email)->plainTextToken;
            return response()->json([
                'token' => $token,
                'user' => $user,
                'success' => True,
            ],Response::HTTP_OK);
        } catch (\Exception $exception){
            return response()->json([
                'message' => 'login failed',
                'success' => False,
            ],Response::HTTP_OK);
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $token = $user->tokens()->delete();
        return response()->json([
            'message'=>'user logout successfully',
            'success' => True,
        ],Response::HTTP_OK);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $user = User::where('email',$request->email)->first();
        if ($user){
            $password = Str::random(9);
            $makeHash = Hash::make($password);
            $user->update([
                'password' => $makeHash
            ]);
            \Mail::to($user)->send(new ResetPassword($password));
            return response()->json([
                'message' => 'Your new password sent to your email successfully check your email inbox and spam to access the password.',
                'success' => True
            ]);
        }else{
            return response()->json([
                'message' => 'This email address does not belong to any user.',
                'success' => false
            ]);
        }
    }
}
