<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apresentacao;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get("/formulario", [apresentacao::class, "create"]);
Route::post("/recebeDados", [apresentacao::class, "store"])->name("recebeDados.store");
Route::get("/cutter", [apresentacao::class, "index"])->name("cutter.index");
Route::get("/formularioCutter", [apresentacao::class, "createcutter"]);
Route::post("/geraCutter", [apresentacao::class, "storecutter"])->name("geraCutter.store");

// a rota abaixo chama a view "exibe":



//$pdf = Pdf::loadView("formulario/exibe");
//return $pdf->download('invoice.pdf');







