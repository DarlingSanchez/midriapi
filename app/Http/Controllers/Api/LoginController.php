<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", "=", $request->email)->first();

        if( isset($user->id) ){
            if(Hash::check($request->password, $user->password)){
                //creamos el token
                $token = $user->createToken("auth_token")->plainTextToken;
                //si está todo ok
                return response()->json([
                    "status" => 1,
                    "message" => "¡Usuario logueado exitosamente!",
                    "id" => $user->id,
                    "name" => $user->name,
                    "token" => $token
                ],200);        
            }else{
                return response()->json([
                    "status" => 0,
                    "message" => "La password es incorrecta",
                ], 409);    
            }

        }else{
            return response()->json([
                "status" => 0,
                "message" => "Usuario no registrado",
            ], 409);  
        }
    }

    public function validateLogin(Request $request)
    {
        return $request->validate([
            "email" => "required|email",
            "password" => "required"            
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'   //requiere confirmacion campo: password_confirmation         
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            "status" => 1,
            "message" => "¡Registro de usuario exitoso!",
        ],200);         
    }
    public function userProfile() {
        return response()->json([
            "status" => 0,
            "msg" => "Acerca del perfil de usuario",
            "data" => auth()->user()
        ]); 
    }

    public function logout() {
        //auth()->user()->tokens()->delete();
        
        return response()->json([
            "status" => 1,
            "msg" => "Cierre de Sesión",            
        ]); 
    }
}
