<?php
namespace App\Models;

use CodeIgniter\Model;

class Entidad extends Model
{
    protected $table = 'entidad';
    protected $allowedFields = ['nombre', 'nombre_corto', 'comentarios'];

    public function getEntidades($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['nombre_corto' => $slug])->first();
    }
}
