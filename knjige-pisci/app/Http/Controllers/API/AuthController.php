<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255|',
            'password'=>[
                'required','string',
                Password::min(8)->letters()->numbers()->mixedCase()->symbols()
            ],
            'country'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'country'=>$request->country
        ]);

        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['data'=>$user,'acces_token'=>$token,'token_type'=>'Bearer']);
    }
    

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json(['message'=>'Neuspesan login'],401);
        }
        $user=User::where('email',$request['email'])->firstOrFail();

        $token=$user->createToken('auth_token')->plainTextToken;

        return response()->json(['message'=>'Uspesno ste se ulogovali'.$user->name,'acess_token'=>$token,'token_type'=>'Bearer']);

    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return ['message'=>'Usesno ste se izlogovali!'];
    }
}
