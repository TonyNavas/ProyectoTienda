<?php

namespace App\Livewire;

use App\Models\CategoryProduct;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CategoryComponent extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $name, $description, $search, $selected_id, $identificador, $CategoryCount;
    private $pagination = 4;

    protected $listeners = ['destroy'];

    public function mount(){
        $this->CategoryCount();
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function CategoryCount(){
        $this->CategoryCount = CategoryProduct::count();
    }

    public function store(){

        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = CategoryProduct::create([
            'name' => $this->name,
            'description' => $this->description,
            'tienda_id' => auth()->user()->tienda->id,
        ]);

        $this->emit('category-stored', $category);
        $this->resetUI();
        $this->CategoryCount();
    }

    public function edit($id){

        $record = CategoryProduct::find($id, ['id', 'name', 'description']);

        $this->name = $record->name;
        $this->description = $record->description;
        $this->selected_id = $record->id;

        // Toastr::info('Ya puedes modificar los datos', 'Datos cargados'
        // ,['positionClass' => 'toast-top-left', 'timeOut' => 0]);
    }

    public function update(){

        $category = CategoryProduct::find($this->selected_id);

        $category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->emit('category-updated', $category);
        $this->resetUI();
        $this->CategoryCount();
        $this->identificador = rand();
    }

    public function destroy(CategoryProduct $category){

        $category->delete();

        $this->resetUI();
        $this->emit('category-deleted');
        $this->CategoryCount();
    }


    public function resetUI(){
        $this->name = '';
        $this->description = '';
        $this->search = '';
        $this->selected_id = 0;
    }
    public function render()
    {
        if(strlen($this->search > 0)){
            $categories = CategoryProduct::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }else{
            $categories = CategoryProduct::where('tienda_id', auth()->user()->tienda->id)
            ->orderBy('id', 'desc')->paginate($this->pagination);
        }

        return view('livewire.categories_products.category-component', compact('categories'))
            ->extends('layouts.app')
            ->section('content');
    }
}
