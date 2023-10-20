<?php

namespace App\Livewire;

use App\Models\CategoryProduct;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $description, $image, $price, $category_id, $search, $selected_id, $identificador;
    protected $pagination = 5;
    public $ProductCount;

    protected $listeners = ['destroy'];

    public function mount()
    {
        $this->productCount();
        $this->identificador = rand();
    }

    public function productCount()
    {
        $this->ProductCount = Product::count();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'category_id' => 'required',
        ]);

        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => auth()->user()->id,
            'tienda_id' => auth()->user()->tienda->id,
        ]);



        if ($this->image) {

            if($product->image){
                Storage::delete($product->image);
            }

           $imageUrl = Storage::put('products', $this->image);
           $product->image = $imageUrl;
           $product->save();

           $this->resetUI();
           $this->productCount();
           $this->emit('product-stored');
        }
    }

    public function edit($id)
    {
        $recordProducts = Product::find($id);
        $this->name = $recordProducts->name;
        $this->description = $recordProducts->description;
        $this->price = $recordProducts->price;
        $this->category_id = $recordProducts->category_id;
        $this->selected_id = $recordProducts->id;
    }

    public function update()
    {

        $product = Product::find($this->selected_id);

        $product->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);

        $this->resetUI();
        $this->productCount();
        $this->emit('product-updated');
    }

    public function destroy($id)
    {

        $product = Product::find($id);
        $product->delete();
        $this->productCount();

        $this->emit('product-deleted');
    }

    public function resetUI(){
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->category_id = null;
        $this->selected_id = 0;
        $this->identificador = rand();
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if (strlen($this->search > 0)) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhereHas('category', function($category){
                $category->where('name', 'like', '%' . $this->search . '%');
            })->paginate($this->pagination);

        } else {
            $products = Product::where('tienda_id', auth()->user()->tienda->id)
            ->orderBy('id', 'desc')->paginate($this->pagination);

            $categories = CategoryProduct::where('tienda_id', auth()->user()->tienda->id)->get();
        }
        return view('livewire.products.product-component', compact('products', 'categories'))
            ->extends('layouts.app')
            ->section('content');
    }
}
