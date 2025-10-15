<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master');
});

Route::get('/about', function (){
    return view('about');
});


Route::resource('employees', EmployeeController::class);

