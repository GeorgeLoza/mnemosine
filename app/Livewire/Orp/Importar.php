<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use League\Csv\Reader;
use Livewire\Component;
use App\Models\Producto;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use PhpParser\Node\Stmt\TryCatch;
use LivewireUI\Modal\ModalComponent;

class Importar extends ModalComponent
{
    /*cvs */
    public $archivoCsv;
    use WithFileUploads;

    public function render()
    {
        return view('livewire.orp.importar');
    }
    public function importarRegistros()
    {
        // Validar el archivo CSV
        $this->validate([
            'archivoCsv' => 'required|mimes:csv,txt'
        ]);

        // Leer y procesar el archivo CSV
        $csv = Reader::createFromPath($this->archivoCsv->getRealPath(), 'r');
        $csv->setDelimiter(';'); // Configurar el delimitador como punto y coma

        $csv->setHeaderOffset(0); // Opcional: si el CSV tiene una fila de encabezado
        $contador = 0;
        foreach ($csv as $registro) {
            $codigoProducto = $registro['ITEM'];

            // Buscar el producto por su código en el archivo CSV
            $producto = Producto::where('codigo', $codigoProducto)->first();

            if ($producto) {
                $contador  = $contador + 1;
                // Crear un nuevo registro en la tabla ORP con el ID del producto
                // Validar si ya existe un registro con el mismo código en la tabla ORP

                $registroExistente = Orp::where('codigo', $registro['ORP'])->first();
                if ($registroExistente) {
                    // Si el código ya existe, muestra un error y omite la creación del nuevo registro
                    // Mostrar mensaje de éxito
                    Toaster::warning('El archivo contiene ORPs repetidas. orp:'.$registro['ORP'])->duration(99999);
                    // $this->dispatch('warning', mensaje: 'El archivo contiene ORPs repetidas');

                    continue;
                }


                // Extraer el número de lotes de los comentarios
                $comentarios = $registro['Comentarios'];

                if (preg_match('/(\d+(?:\.\d+)?)\s*(?:pp|PP|pP|qq|QQ|Qq)\b/', $comentarios, $matches)) {
                    // Si se encuentra "PP", se asigna el valor directamente
                    $lotes = $matches[1];
                } else {
                    // En caso de no encontrar "PP QQ", asignar null
                    $lotes = null;
                }

                try {
                    Orp::create([
                        'codigo' => $registro['ORP'],
                        'producto_id' => $producto->id,
                        'estado' => 'Pendiente',
                        'lote' => $lotes,
                    ]);

                    // Toaster::success('User created!');
                    $this->dispatch('actualizar_tabla_orps');
                    $this->closeModal();
                    // Toaster::success('Orp created!' . $contador);
                    // $this->dispatch('success', mensaje: 'Importacion realizada exitosamente cantidad de orps registradas:   ' . $contador);

                } catch (\Throwable $th) {
                    $this->closeModal();
                    Toaster::error('not Orp created!' . $th->getMessage())->duration(null);
                    // $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
                }
            } else {
                Toaster::error('El producto no existe de la orp: '.$registro['ORP']. 'codigo de producto: ' . $codigoProducto)->duration(99999);
                // $this->dispatch('alert', mensaje: 'Importacion realizada exitosamente cantidad de orps registradas:   ' . $contador);
            }
        }
        Toaster::success('analisis completo del archivo, orps subidas:' . $contador);
        // Limpiar el campo del archivo CSV
        $this->archivoCsv = '';
        // Mostrar un mensaje de éxito si no hay errores

    }
}
