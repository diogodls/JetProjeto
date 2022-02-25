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

    public function loginUser(Request $request){
        $data = $request->only([
            'email',
            'password'
        ]);

        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('login')
            ->withInput()
            ->withErrors($validator);
        }

        if(Auth::attempt($data)){
            return redirect()->route('home');
        }else{
            $validator->errors()->add('password', 'Email e/ou senha errados.');

            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput();
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
            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput();
        }

        $user = $this->create($data);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('home');
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
