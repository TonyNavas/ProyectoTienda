<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Tienda;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class TiendaController extends Controller
{
    use WithPagination;

    public function index()
    {
        $tiendas = Tienda::where('user_id', Auth::id())->get();

        $productos = collect();

        foreach ($tiendas as $t) {
            $productosTienda = Product::where('tienda_id', $t->id)->get();
            $categorias = CategoryProduct::where('tienda_id', $t->id)->get();
            $productos = $productos->concat($productosTienda);
        }
        return view('tiendas.index', compact('productos', 'categorias', 'tiendas'));
    }

    public function all_stores()
    {

        $tiendas = Tienda::all();
        return view('tiendas.all-stores', compact('tiendas'));
    }

    public function mostrarTienda($tiendaId)
    {
        $tienda = Tienda::find($tiendaId);
        $categorias = CategoryProduct::where('tienda_id', $tiendaId)->get();
        $productos = $tienda->products;

        return view('tiendas.show', compact('tienda', 'categorias', 'productos'));
    }

    public function productDetail($productId)
    {

        $producto = Product::find($productId);
        $similares = Product::where('category_id', $producto->category_id)
            ->where('id', '!=', $producto->id)
            ->latest('id', 'desc')
            ->take(5)
            ->get();

        return view('products_detail.detail', compact('producto', 'similares'));
    }

    public function showProductsHome()
    {
        $products = Product::paginate(9);
        $tiendas = Tienda::paginate(9);
        return view('inicio', compact('products', 'tiendas'));
    }

    public function pay(Product $product){
        return view('products_tienda.pay', compact('product'));
    }
}
