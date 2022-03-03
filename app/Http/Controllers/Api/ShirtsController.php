<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shirt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class ShirtsController extends Controller
{
    public function index(){
        return Shirt::all();
    }

    public function createShirt(Request $request){
        $data = $request->only([
            'modelo',
            'description',
            'price',
            'brand'
        ]);

        $validator = $this->validator($data);

        if($validator->fails()){
            $array['erros'] = $validator->errors();

            return response()->json($array, 400);
        }

        $shirt = new Shirt;
        $shirt->modelo = $request['modelo'];
        $shirt->description = $request['description'];
        $shirt->price = $request['price'];
        $shirt->brand = $request['brand'];
        $shirt->save();

        return response()->json([
            'criado' => true
        ]);
    }

    public function seeShirt($id){
        $shirt = Shirt::findOrFail($id);

        return response()->json($shirt);
    }
    
    public function editShirt($id, Request $request){
        $shirt = Shirt::find($id);

        if(!$shirt){
            return response()->json([
                'erro' => 'Camiseta não encontrada!'
            ], 400);
        }

        $data = $request->only([
            'modelo',
            'description',
            'price',
            'brand'
        ]);

        if($data['modelo'] != $shirt->modelo){
            $editValidator = Validator::make($data, [
                'modelo' => ['required', 'string', 'max:255']
            ]);
            if($editValidator->fails()){
                $array['erro'] = $editValidator->errors();
                return response()->json($array, 400);
            }
            $shirt->modelo = $data['modelo'];
        }

        if($data['description'] != $shirt->description){
            $editValidator = Validator::make($data, [
                'description' => ['required', 'string', 'max:255']
            ]);
            if($editValidator->fails()){
                $array['erro'] = $editValidator->errors();
                return response()->json($array, 400);
            }
            $shirt->description = $data['description'];
        }

        if($data['price'] != $shirt->price){
            $editValidator = Validator::make($data, [
                'price' => ['required', 'numeric']
            ]);
            if($editValidator->fails()){
                $array['erro'] = $editValidator->errors();
                return response()->json($array, 400);
            }
            $shirt->price = $data['price'];
        }

        if($data['brand'] != $shirt->brand){
            $editValidator = Validator::make($data, [
                'brand' => ['required', 'string', 'max:255']
            ]);
            if($editValidator->fails()){
                $array['erro'] = $editValidator->errors();
                return response()->json($array, 400);
            }
            $shirt->brand = $data['brand'];
        }
        
        $shirt->save();

        return response()->json();

    }

    public function find($id){
        $shirt = Shirt::where('modelo', 'like', '%'.$id.'%')->get();
        
        return response()->json($shirt);
    }

    public function destroy($id){
        $shirt = Shirt::find($id);
        $shirt->delete();

        return redirect()->route('home');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'modelo' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'brand' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
        ]);

    }
}
