<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartamentosModel;
use App\Models\EmpleadosModel;

class Empleados extends BaseController
{
  protected $helpers = ['form'];   
  /**
     * Return an array of resource objects, themselves in array format.
     * 
     * @return ResponseInterface
     */
    public function index()
{
  $empleadosModel = new EmpleadosModel();
  $data['empleados'] = $empleadosModel->findAll();
    return view('empleados/index', $data);
}


    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
      $departamentosModel = new DepartamentosModel();
      $data['departamentos'] = $departamentosModel->findAll();
     return view ('empleados/nuevo', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
    'clave' => 'required|min_length[5]|max_length[10]|is_unique[empleados.clave]',
    'nombre' => 'required',
    'fecha_nacimiento' => 'required',
    'telefono' => 'required',
   // 'email' => 'valid_email',
    'departamento' => 'required|is_not_unique[departamentos.id]'
];

        if(!$this->validate($reglas)){
          return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['clave', 'nombre', 'fecha_nacimiento', 'telefono', 'email', 'departamento']);

        $empleadosModel = new EmpleadosModel();
        $empleadosModel -> insert([
            'clave' => trim($post['clave']),
            'nombre' => trim($post['nombre']),
            'fecha_nacimiento' => $post['fecha_nacimiento'],
            'telefono' => $post['telefono'],
             'email' => $post['email'],
             'id_departamento' => $post['departamento'],

        ]);

        return redirect() -> to('empleados');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
      if ($id == null) {
        return redirect()->route('empleados');
      }
      $empleadosModel = new EmpleadosModel();
      $departamentosModel = new DepartamentosModel();
      
      $data['departamentos'] = $departamentosModel->findAll();
      $data['empleado'] = $empleadosModel->find($id);

        return view('empleados/editar', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
         $reglas = [
    'clave' => "required|min_length[5]|max_length[10]|is_unique[empleados.clave,id,{$id}]",
    'nombre' => 'required',
    'fecha_nacimiento' => 'required',
    'telefono' => 'required',
   // 'email' => 'valid_email',
    'departamento' => 'required|is_not_unique[departamentos.id]'
];

        if(!$this->validate($reglas)){
          return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['clave', 'nombre', 'fecha_nacimiento', 'telefono', 'email', 'departamento']);

        $empleadosModel = new EmpleadosModel();
        $empleadosModel -> update($id, [
            'clave' => trim($post['clave']),
            'nombre' => trim($post['nombre']),
            'fecha_nacimiento' => $post['fecha_nacimiento'],
            'telefono' => $post['telefono'],
             'email' => $post['email'],
             'id_departamento' => $post['departamento'],

        ]);

        return redirect() -> to('empleados');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
