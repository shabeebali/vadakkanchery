<?php

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('download', function () {
    $data = \App\Models\Member::where('level', 1)->where('in_law', 0)->get();
    $pdf = PDF::loadView('download', ['data' => $data]);
    return $pdf->download('members.pdf');
});
