<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


class PageController extends Controller
{
    public function showOne()
    {
        return view('test',[
            'var1'=>'nomer1',
            'var2'=>'nomer2',
        ]);
    }

}
