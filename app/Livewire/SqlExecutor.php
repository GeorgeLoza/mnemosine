<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SqlExecutor extends Component
{
    public $query;
    public $result;
    public $error;

    public function execute()
{
    $this->reset('result', 'error');

    try {
        // Obtener la consulta y eliminar espacios extra
        $query = trim($this->query);
        

        // Verifica si la consulta está vacía
        if (empty($query)) {
            $this->error = "La consulta no puede estar vacía.";
            return; // No hacemos nada si la consulta está vacía
        }

        // Asegúrate de que la consulta sea una cadena de texto
        if (is_string($query)) {
            // Si la consulta es SELECT, ejecutamos la consulta SELECT
            if (str_starts_with(strtoupper($query), 'SELECT')) {
                $this->result = DB::select($query);  // Consulta SELECT
            } else {
                // Si la consulta es de modificación (INSERT, UPDATE, DELETE)
                $affected = DB::statement($query);  // Consulta de modificación
                $this->result = "Consulta ejecutada con éxito. Filas afectadas: $affected.";
            }
        } else {
            $this->error = "La consulta debe ser una cadena de texto.";
        }
    } catch (\Exception $e) {
        // Captura cualquier error y muestra el mensaje
        $this->error = "Error al ejecutar la consulta: " . $e->getMessage();
    }
}




    public function render()
    {
        return view('livewire.sql-executor');
    }
}
