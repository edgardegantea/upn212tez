<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Config;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PeriodoEscolarModel;

class PeriodoEscolar extends ResourceController
{

    private $periodoescolar;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->periodoescolar = new PeriodoEscolarModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $periodosescolares = $this->periodoescolar->orderBy('id', 'desc')->findAll();
        $data = ['periodosescolares'   => $periodosescolares];
        return view('admin/periodosescolares/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $periodoescolar = $this->periodoescolar->find($id);

        if ($periodoescolar) {
            return view('admin/periodosescolares/show', compact('periodoescolar'));
        } else {
            return redirect()->to('admin/periodosescolares');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('admin/periodosescolares/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $inputs = $this->validate([
            'clave'         => 'required|min_length[1]|max_length[10]',
            'nombre'        => 'required|min_length[2]|max_length[255]',
            'creditos'      => 'required',
            'horasSemana'   => 'required'
        ]);

        if (!$inputs) {
            return view('admin/asignaturas/create', ['validation' => $this->validator]);
        }

        $this->asignatura->save([
            'clave'             => $this->request->getVar('clave'),
            'nombre'            => $this->request->getVar('nombre'),
            'descripcion'       => $this->request->getVar('descripcion'),
            'creditos'          => $this->request->getVar('creditos'),
            'horasSemana'       => $this->request->getVar('horasSemana'),
            'temario'           => $this->request->getVar('temario'),
            'temarioArchivo'    => $this->request->getVar('temarioArchivo')
        ]);

        return redirect()->to(site_url('/admin/asignaturas'));
        session()->setFlashdata("success", "Asignatura registrada con éxito");
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
