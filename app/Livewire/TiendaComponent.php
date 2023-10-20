<?php

namespace App\Livewire;

use App\Models\Tienda;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class TiendaComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $description, $address, $image, $search, $identificador, $selected_id;
    protected $pagination = 5;

    protected $listeners = ['destroy'];

    public function mount(){
        $this->identificador = rand();
    }

    public function store(){
        $this->validate([
            'name'  => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);

        $tienda = Tienda::create([
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'user_id' => auth()->user()->id,
        ]);

        if ($this->image) {

            if($tienda->image){
                Storage::delete($tienda->image);
            }

           $imageUrl = Storage::put('tienda_image', $this->image);
           $tienda->image = $imageUrl;
           $tienda->save();

           $this->resetUI();
           $this->emit('tienda-stored');
        }
    }
    public function edit($id)
    {
        $record = Tienda::find($id);
        $this->name = $record->name;
        $this->description = $record->description;
        $this->address = $record->address;
        $this->selected_id = $record->id;
    }

    public function update(){

        $tienda = Tienda::find($this->selected_id);

        $tienda->update([
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,

        ]);

        if ($this->image) {

            if($tienda->image){
                Storage::delete($tienda->image);
            }
           $imageUrl = Storage::put('tienda_image', $this->image);
           $tienda->image = $imageUrl;
           $tienda->save();

        }

        $this->resetUI();
        $this->emit('tienda-updated');
    }

    public function destroy($id)
    {

        $tienda = Tienda::find($id);
        $tienda->delete();

        $this->emit('tienda-deleted');
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function resetUI(){
        $this->name = '';
        $this->description = '';
        $this->address = '';
        $this->identificador = rand();
    }

    public function render()
    {
        if(strlen($this->search > 0)){
            $tiendas = Tienda::where('name', 'LIKE', '%' . $this->search . '%')->paginate($this->pagination);
        }else{
            $tiendas = Tienda::where('user_id', auth()->user()->id)->paginate($this->pagination);
        }
        return view('livewire.tienda.tienda-component', compact('tiendas'))
        ->extends('layouts.app')
        ->section('content');
    }
}
