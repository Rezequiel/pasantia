<?php
namespace App\Models;

use CodeIgniter\Model;

class Entidad extends Model
{
    protected $table = 'entidad';
    protected $allowedFields = ['nombre', 'nombre_corto', 'comentarios', 'titular_id'];

    public function getEntidades($slug = false)
    {
        if ($slug === false) {
            return $this->join('persona', 'entidad.titular_id = persona.id')->findAll();
        }

        return $this->join('persona', 'entidad.titular_id = persona.id')->where(['nombre_corto' => $slug])->first();
    }
}
