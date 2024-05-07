<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Marques;
use App\Models\Products;
use App\Models\State;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormAddMarques extends Component
{
    use WithFileUploads;

    public $image;
    public $marques;



    public $name;

    public $logo_ref;


    protected $rules = [
        'name' => 'required',

    ];
    public function render()
    {
        return view('livewire.form-add-marques');
    }


    public function mount()
    {
        $this->loadMarques();

    }

    public function loadMarques()
    {
        $this->marques = Marques::all();
    }


    public function createMarca()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required|image', // Validación de la imagen
        ]);

        $existingIds = Marques::pluck('id')->toArray();

        $nextId = 1;
        while (in_array($nextId, $existingIds)) {
            $nextId++;
        }

        $imageName = $this->image->store('Img', 'public');

        $imagePath = storage_path("app/public/$imageName");
        $publicImagePath = public_path("Img/Marques/{$this->image->getClientOriginalName()}");
        File::move($imagePath, $publicImagePath);

        $imageUrl = asset("Img/Marques/{$this->image->getClientOriginalName()}");
        $imageUrl = str_replace(url('/'), '', $imageUrl);

        Marques::create([
            'id' => $nextId,
            'name' => $this->name,
            'logo_ref' => $imageUrl,

        ]);

        $this->reset(['name']);

        $this->loadMarques();

        return redirect()->route('panelMarques');
    }


}
