<?php

namespace App\Models;

use CodeIgniter\Model;

class Persona extends Model
{
    protected $table = "persona";
    protected $allowedFields = ['nombre_persona', 'apellido'];

    public function getPersona($nombre, $apellido)
    {
        return $this->where([
            'nombre_persona' => $nombre,
            'apellido' => $apellido,
        ])->first();
    }

    public function getEntidades(?string $slug)
    {
        return $this->findAll();
    }
}
