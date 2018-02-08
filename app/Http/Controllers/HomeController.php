<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showData() {
         $menus = Menu::all();
          $datas = DB::table('restaurents')
            ->join('menus', 'menus.restaurent_id', '=', 'restaurents.id')
            ->join('items', 'items.menu_id', '=', 'menus.id')
            ->select('restaurents.restaurent_name','menus.*','items.*')
            ->get();

         return view('resturent',compact('datas','menus'));
    }



}
