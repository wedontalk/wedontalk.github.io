<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class menuController extends Controller

{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = menu::all();
        return view('user.menu', compact('menu'));
    }
}
