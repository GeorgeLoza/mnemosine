<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use App\Models\Color;
use App\Models\User;
use App\Notifications\CierreOrp;
use App\Notifications\orpNotification;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\Attributes\On;

class Tabla extends Component
{
    use WithPagination;
    //filtros-busqueda
    public $f_codigo = null;
    public $f_codigoProducto = null;
    public $f_nombreProducto = null;
    public $f_lote = null;
    public $f_estado = null;
    public $f_tiempoElaboracion = null;
    public $f_fechaVencimiento1 = null;
    public $f_fechaVencimiento2 = null;
    public $f_producto = null;
    public $f_productoCodigo = null;
    //categoria
    public $f_grupo = null;


    public $aplicandoFiltros = false;

    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    //mostrar filtro
    public $filtro = false;

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }



    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function iniciar($id)
    {

        $registro = Orp::find($id);
        $registro->estado = 'En proceso';
        $registro->tiempo_elaboracion = now();
        $registro->save();

    }

    public function cancelar($id)
    {
        $registro = Orp::find($id);
        $registro->estado = 'Cancelado';
        $registro->save();

    }

    public function pendiente($id)
    {
        $registro = Orp::find($id);
        $registro->estado = 'Pendiente';
        $registro->save();
    }

    public function programar($id)
    {
        $registro = Orp::find($id);
        $registro->estado = 'Programado';
        $registro->save();
    }
    public function completar($id)
    {
        $registro = Orp::find($id);
        $registro->estado = 'Completado';
        $registro->save();
    }

    public function mount()
    {
        $this->sortField = 'created_at';
        $this->sortAsc = false;
    }


    #[On('actualizar_tabla_orps')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        $query = Orp::query()

            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })

            //prueba
            ->when($this->f_grupo, function ($query) {
                return $query->whereHas('producto.categoriaProducto', function ($query) {
                    $query->where('grupo', 'like', '%' . $this->f_grupo . '%');
                });
            })
            //fin prueba
            ->when($this->f_codigoProducto, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_codigoProducto . '%');
                });
            })
            ->when($this->f_nombreProducto, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_nombreProducto . '%');
                });
            })
            ->when($this->f_lote, function ($query) {
                return $query->where('lote', 'like', '%' . $this->f_lote . '%');
            })
            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })
            ->when($this->f_tiempoElaboracion, function ($query) {
                return $query->where('tiempo_elaboracion', 'like', '%' . $this->f_tiempoElaboracion . '%');
            })
            ->when($this->f_fechaVencimiento1, function ($query) {
                return $query->where('fecha_vencimiento1', 'like', '%' . $this->f_fechaVencimiento1 . '%');
            })
            ->when($this->f_fechaVencimiento2, function ($query) {
                return $query->where('fecha_vencimiento2', 'like', '%' . $this->f_fechaVencimiento2 . '%');
            })

            ->when($this->f_productoCodigo, function ($query) {
                return $query->whereHas('producto', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_productoCodigo . '%');
                });
            })

            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });
        $orps = $this->aplicandoFiltros ? $query->get() : $query->paginate(50);


        return view('livewire.orp.tabla', [
            'orps' => $orps
        ]);
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }
    public function limpiarFiltros()
    {
        $this->reset(['f_codigo', 'f_codigoProducto', 'f_nombreProducto', 'f_lote', 'f_estado', 'f_tiempoElaboracion', 'f_fechaVencimiento1', 'f_fechaVencimiento2', 'f_productoCodigo','f_grupo']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_codigo || $this->f_codigoProducto || $this->f_nombreProducto || $this->f_lote || $this->f_estado || $this->f_tiempoElaboracion || $this->f_fechaVencimiento1 || $this->f_fechaVencimiento2 || $this->f_productoCodigo || $this->f_grupo;
    }
}
