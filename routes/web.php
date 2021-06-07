<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Routing\Router;
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
Route::middleware(['auth'])->group(function(){
    Route::any('/produtos/search', [ProdutosController::class, 'pesquisa'])->name('produtos.search');
    Route::get('/produtos', [ProdutosController::class, 'index'])->name ('produtos.index');
    Route::get('/produtos/create', [ProdutosController::class, 'create'])->name ('produtos.create');
    Route::post('/produtos', [ProdutosController::class, 'store'])->name ('produtos.store');
    Route::get('/produtos/edit/{id}', [ProdutosController::class, 'edit'])->name('produtos.edit');
    Route::delete('/produtos/{id}', [ProdutosController::class, 'delete'])->name('produtos.delete');
    Route::get('/produtos/{id}', [ProdutosController::class, 'show'])->name('produtos.show');
    Route::put('/produtos/{id}', [ProdutosController::class, 'update'])->name ('produtos.update');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Produtos', function () {
    return view('index');
})->middleware(['auth'])->name('index');

require __DIR__.'/auth.php';
