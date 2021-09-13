<?php

use App\Http\Controllers\Todo;
use Illuminate\Support\Facades\Route;



Route::get('/', [Todo::class,"index"]);
Route::post('/create', [Todo::class,"add"]);
Route::get('/get', [Todo::class,"get"]);
Route::get('/delete', [Todo::class,"delete"]);
