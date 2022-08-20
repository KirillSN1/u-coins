<?php

use Illuminate\Support\Facades\Log;
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
Route::get('/test', function(){
    $PDO = \DB::connection()->getPdo();
    $st = $PDO->prepare("SELECT name FROM test_table");
    $st->execute();
    $names = array();
    while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
        Log::debug('Row ' . $row['name']);
        // $app['monolog']->addDebug('Row ' . $row['name']);
        $names[] = $row;
    }

    return view('test', [ 'names' => $names ]);
});
