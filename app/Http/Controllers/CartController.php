<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        $maphong = $request->phongid_hidden;
        $data = DB::table('phongthue')->where('Maphongthue',$maphong)->get();
        
    }
}
