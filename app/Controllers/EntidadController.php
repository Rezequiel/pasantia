<?php
namespace App\Controllers;

use App\Models\Entidad;
use CodeIgniter\Exceptions\PageNotFoundException;

class EntidadController extends BaseController
{
    public function index()
    {
        return view('templates/header', $this->obtenerDatos()).
            view('entidades/index').view('templates/footer');
    }

    public function view($slug = null)
    {
        $data = $this->obtenerDatos($slug);

        if (empty($data['entidades'])) {
            throw new PageNotFoundException('No se encontró nada.');
        }

        $data['title'] = $data['entidades']['nombre'];

        return view('templates/header', $data).
            view('entidades/view').view('templates/footer');
    }    

    public function create()
    {
        helper('form');

        if (!$this->request->is('post')) {

            return view('templates/header', ['title' => 'Nuevo elemento'])
                .view('entidades/create')
                .view('templates/footer');
        }

        $post = $this->request->getPost(['nombre', 'comentarios']);

        if (!$this->validateData($post, [
            'nombre' => 'required|max_length[255]|min_length[3]',
            'comentarios'  => 'required|max_length[5000]|min_length[10]',
        ])) {

            return view('templates/header', ['title' => 'Nuevo elemento'])
                .view('entidades/create')
                .view('templates/footer');
        }

        $model = model(Entidad::class);

        $model->save([
            'nombre' => $post['nombre'],
            'nombre_corto'  => url_title($post['nombre'], '-', true),
            'comentarios'  => $post['comentarios'],
        ]);

        return view('templates/header', ['title' => 'Nuevo elemento'])
            .view('entidades/success')
            .view('templates/footer');
    }

    private function obtenerDatos(?string $slug = null)
    {
        $model = model(Entidad::class);

        return [
            'entidades' => $model->getEntidades($slug ?: false),
            'title' => 'Entidades guardadas'
        ];
    }
}
