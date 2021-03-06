<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginUser(Request $request){
        $data = $request->only([
            'email',
            'password'
        ]);

        $validatorUser = Validator::make($data, [
            'email' => ['email:filter', 'required'],
            'password' => ['between:4,255', 'string', 'required']
        ]);

        if($validatorUser->fails()){
            $arrayLogin['erros'] = $validatorUser->errors();

            return response()->json($arrayLogin, 400); 
        }

        if(Auth::attempt($data)){
            $user = User::where('email', $data['email'])->get();
            return response()->json($user, 200);
        }else{
            $validatorUser->errors()->add('password', 'Email e/ou senha errados.');

            $arrayLogin['erros'] = $validatorUser->errors();
            return response()->json($arrayLogin, 400); 
        }
        
    }

    public function registerUser(Request $request){
        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);

        $validator = $this->validator($data);

        if($validator->fails()){
            $array['error'] = $validator->errors();

            return response()->json($array, 400); 
        }

        $user = $this->create($data);
        Auth::login($user);
    }

    public function getEdit($id){
        $user = User::findOrFail($id);

        return response()->json($user);
    }
    
    public function edit($id, Request $request){
        $user = User::find($id);

        if(!$user){
            return response()->json([
                'erro' => 'Usuário não encontrado!'
            ], 400);
        }

        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);

        if($data['name'] != $user->name){
            $editValidator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255']
            ]);
            if($editValidator->fails()){
                $array['erro'] = $editValidator->errors();
                return response()->json($array, 400);
            }
            $user->name = $data['name'];
        }

        if($data['email'] != $user->email){
            $editValidator = Validator::make($data, [
                'email' => ['required', 'string', 'email:filter', 'max:255', 'unique:users']
            ]);
            if($editValidator->fails()){
                $array['erro'] = $editValidator->errors();
                return response()->json($array, 400);
            }
            $user->email = $data['email'];
        }

        if($data['password'] != ''){
            if($data['password'] != $user->password){
                $editValidator = Validator::make($data, [
                    'password' => ['required', 'string', 'between:4,255', 'confirmed']
                ]);
                if($editValidator->fails()){
                    $array['erro'] = $editValidator->errors();
                    return response()->json($array, 400);
                }
                $user->password = Hash::make($data['password']);
            }
        }
        
        $user->save();

        return response()->json();

    }

    public function find($id){
        $user = User::where('name', 'like', '%'.$id.'%')->get();
        
        return response()->json($user);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        Auth::logout();
        
        return response()->json([
            'deletar' => true
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:filter', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'between:4,255', 'confirmed'],
        ]);

    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
    
    public function index(){
        return User::all();
    }
}
