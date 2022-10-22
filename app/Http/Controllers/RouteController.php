<?php

namespace App\Http\Controllers;
use App\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function InsertData(){
        Route::create([
            'name' => 'Highlevel Road'
        ]);
        Route::create([
            'name' => 'Galle Road'
        ]);
        Route::create([
            'name' => 'Kandy Road'
        ]);
        echo 'data inserted';
    }
}
