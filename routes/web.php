<?php

use App\Livewire\ProductComponent;
use App\Livewire\CategoryComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;
use App\Livewire\ProductShowComponent;
use App\Livewire\TiendaComponent;

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

Route::get('/carrito', function () {
    return view('carrito');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/menu', function () {
    return view('menu');
});
Route::get('/tiendas', function () {
    return view('tiendas');
});

Route::get('/tienda-ejemplo', function () {
    return view('tienda-ejemplo');
});

Route::get('/historial', function () {
    return view('/historial');
});
Route::get('/mensaje', function () {
    return view('mensaje');
});

Route::get('/mensaje-ejemplo', function () {
    return view('mensaje-ejemplo');
});
Route::get('/prodhist', function () {
    return view('prodhist');
});
Route::get('/tendencias', function () {
    return view('tendencias');
});
Route::get('/productoten', function () {
    return view('productoten');
});
Route::get('/listadeseos', function () {
    return view('listadeseos');
});
Route::get('/productodeseos', function () {
    return view('productodeseos');

});
Route::get('/podriangustar', function () {
    return view('podriangustar');
});

Route::get('/prodpodrian', function () {
    return view('prodpodrian');
});

Route::get('/categorias', function () {
    return view('categorias');
});

Route::get('/arte', function () {
    return view('arte');
});

Route::get('/artesania', function () {
    return view('artesania');
});

Route::get('/manual', function () {
    return view('manual');
});

Route::get('/prodartesania', function () {
    return view('prodartesania');
});
Route::get('/prodarte', function () {
    return view('prodarte');
});
Route::get('/prodmanual', function () {
    return view('prodmanual');
});
Route::get('/prodcarrito', function () {
    return view('prodcarrito');
});

Route::get('/busqueda', function () {
    return view('busqueda');
});
Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/categorias', CategoryComponent::class)->name('categorias.index');
    Route::get('/productos', ProductComponent::class)->name('product.index');
    Route::get('/tiendas/create', TiendaComponent::class)->name('tienda.create');

});

// Ruta para ver la tienda propia de un usuario autenticado
Route::get('/mystore/{tienda}', [TiendaController::class, 'index'])->name('tienda.home');

// Ruta para ver todas las tiendas
Route::get('/tiendas', [TiendaController::class, 'all_stores'])->name('tienda.all');

// Ruta para ver una tienda en especifico
Route::get('/tiendas/{tiendaId}', [TiendaController::class, 'mostrarTienda'])->name('tienda.show');

// Mostrar el detalle de un producto
Route::get('/tienda/productos/{productId}', [TiendaController::class, 'productDetail'])->name('product.show');

Route::get('product/{product}/pay', [TiendaController::class, 'pay'])->middleware('auth')->name('products.pay');

Route::get('/inicio', [TiendaController::class, 'showProductsHome'])->name('inicio');

Auth::routes();
