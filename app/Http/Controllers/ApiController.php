<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getProducts(){
        $products = Products::all();
        return response()->json($products);
    }
}
