<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shirt;
use Illuminate\Support\Facades\Validator;

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
            return redirect()->route('home');
        }

        $shirt = new Shirt;
        $shirt->modelo = $request['modelo'];
        $shirt->description = $request['description'];
        $shirt->price = $request['price'];
        $shirt->brand = $request['brand'];
        $shirt->save();

        return redirect()->route('home');
    }

    public function seeShirt($id){
        $shirt = Shirt::findOrFail($id);

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
        ]);

    }
}
