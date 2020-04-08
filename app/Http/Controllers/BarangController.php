<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id=null)
    {
        $data =  new \stdClass();
        $data->class = 'block-mode-hidden';
        $data->id = $id;
        return view('pages.barang',  compact('data'));
    }

    public function store(Request $request)
    {
        return $request->all();
    }


}
