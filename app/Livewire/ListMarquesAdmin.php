<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Marques;
use App\Models\Products;
use App\Models\State;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class ListMarquesAdmin extends Component
{
    public $marques;
    public $marquesColumns;
    public $categories;
    public $estat;
    public $name;
    public $description;
    public $price;
    public $stock;
    public $selectedCategory;
    public $selectedProductId;
    public $orderBy;
    public $groupBy;

    public $selectedState;

    public function render()
    {
        return view('livewire.list-marques-admin');
    }


    public function mount()
    {
        $this->orderBy = 'id';
        $this->groupBy = null;

        $this->loadMarques();
        $this->loadMarquesColumns();

    }

    /**
     * Carrega les marques de la bd
     * @return void
     */
    public function loadMarques()
    {
        $query = Marques::query();

        // Aplicar filtre d'ordre
        $query->orderBy($this->orderBy, 'asc');


        $this->marques = $query->get();
    }

    /**
     * Carrega les columnes de la taula marques
     * @return void
     */
    public function loadMarquesColumns()
    {
        $this->marquesColumns = Schema::getConnection()
            ->getSchemaBuilder()
            ->getColumnListing('marques');

        // Columnes que vols excloure del llistat
        $excludedColumns = ['image_url', 'created_at', 'updated_at'];

        // Filtrar les columnes excloses
        $this->marquesColumns = array_diff($this->marquesColumns, $excludedColumns);
    }


    /**
     * Borra la marca de la bd i la imatge associada dels arxius locals
     * @param $marquesId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMarca($marquesId)
    {
        $marques = Marques::findOrFail($marquesId);

        if ($marques) {
            // Eliminar la imatge(dels arxius locals) associada al producte si existeix
            if ($marques->logo_ref) {
                $logoRef = public_path($marques->logo_ref);
                if (file_exists($logoRef)) {
                    unlink($logoRef);
                }
            }

            // Elimina el producte de la bd
            $marques->delete();

            // Recargar los productos
            $this->loadMarques();
        }

        return redirect()->route('panelMarques');
    }


    // Agafo la id passada a la vista amb onclick i redirigeixo a la ruta amb les dades.
    public function edit($marquesId)
    {
        return redirect()->route('marques.edit', ['id' => $marquesId]);
    }

}
