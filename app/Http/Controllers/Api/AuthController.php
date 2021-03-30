<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
  
    public function register(Request $request) {    
        $validator = $request->validate([ 
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',  
                'c_password' => 'required|same:password', 
            ]);   
        $input = $request->all();  
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $accessToken =  $user->createToken('authToken')->accessToken;
        return response()->json(['user'=>$user, 'access_token' => $accessToken, 'success' => true], 200); 
    }
  
   
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $accessToken =  $user->createToken('authToken')->accessToken;
            return response()->json(['user'=>$user, 'access_token' => $accessToken, 'success' => true], 200); 
        } else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    
    public function getUser() {
        $user = Auth::user();
        return response()->json(['user' => $user, 'success' => true], 200); 
    }
}
