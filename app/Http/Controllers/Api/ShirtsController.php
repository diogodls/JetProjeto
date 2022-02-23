<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shirt;

class ShirtsController extends Controller
{
    public function index(){
        return Shirt::all();
    }
}
