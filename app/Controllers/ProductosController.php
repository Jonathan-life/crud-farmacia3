<?php

namespace App\Controllers;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class ProductosController extends BaseController
{
    // 👉 Este método evita el error 404 cuando visitas /productos
    public function index()
    {
        return $this->listar();
    }

    public function listar()
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel->select('productos.*, categorias.nombre as categoria')
            ->join('categorias', 'productos.categoria_id = categorias.id')
            ->findAll();

        $data = [
            'productos' => $productos,
            'header' => view('Layouts/header'),
            'footer' => view('Layouts/footer'),
        ];

        return view('productos/listar', $data);
    }

    public function crear()
    {
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->findAll();

        $data = [
            'categorias' => $categorias,
            'header' => view('Layouts/header'),
            'footer' => view('Layouts/footer'),
        ];

        return view('productos/crear', $data);
    }

    public function guardar()
    {
        $productoModel = new ProductoModel();

        $imagen = $this->request->getFile('imagen');
        $nombreImagen = null;

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombreImagen = $imagen->getRandomName();
            $imagen->move('uploads/', $nombreImagen);
        }

        $datos = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'categoria_id' => $this->request->getPost('categoria_id'),
            'imagen' => $nombreImagen,
        ];

        $productoModel->insert($datos);
        return redirect()->to(base_url('productos'));
    }

    public function editar($id = null)
    {
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();

        $producto = $productoModel->find($id);
        if (!$producto) {
            return redirect()->to(base_url('productos'));
        }

        $categorias = $categoriaModel->findAll();

        $data = [
            'producto' => $producto,
            'categorias' => $categorias,
            'header' => view('Layouts/header'),
            'footer' => view('Layouts/footer'),
        ];

        return view('productos/editar', $data);
    }

    public function actualizar($id = null)
    {
        $productoModel = new ProductoModel();

        $datos = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'categoria_id' => $this->request->getPost('categoria_id'),
        ];

        $imagen = $this->request->getFile('imagen');

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $producto = $productoModel->find($id);
            if ($producto['imagen']) {
                @unlink('uploads/' . $producto['imagen']);
            }

            $nombreImagen = $imagen->getRandomName();
            $imagen->move('uploads/', $nombreImagen);
            $datos['imagen'] = $nombreImagen;
        }

        $productoModel->update($id, $datos);
        return redirect()->to(base_url('productos'));
    }
}


