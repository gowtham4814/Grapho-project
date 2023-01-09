<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class addproduct extends Controller
{
    function addProd(Request $req){
        $product = new Product;
        $product->name=$req->addname;
        $product->qty=$req->addqty;
        $product->price=$req->addprice;
        $product->qnt=$req->addqnt;
        $product->exp=$req->addexp;
    }
}
