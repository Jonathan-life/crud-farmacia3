<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class ProductosController extends BaseController
{
    // Evita el error 404 cuando visitas /productos
    public function index()
    {
        return $this->listar();
    }

    // Listar productos (con filtro por categoría)
    public function listar()
    {
        $productoModel  = new ProductoModel();
        $categoriaModel = new CategoriaModel();

        // Obtener categorías
        $categorias = $categoriaModel->findAll();

        // Filtro por categoría si hay GET
        $categoria_id = $this->request->getGet('categoria_id');
        if ($categoria_id) {
            $productoModel->where('productos.categoria_id', $categoria_id);
        }

        // Obtener productos con nombre de categoría
        $productos = $productoModel->select('productos.*, categorias.nombre as categoria')
            ->join('categorias', 'productos.categoria_id = categorias.id')
            ->findAll();

        $data = [
            'productos'   => $productos,
            'categorias'  => $categorias,
            'header'      => view('Layouts/header'),
            'footer'      => view('Layouts/footer'),
        ];

        return view('productos/listar', $data);
    }

    // Mostrar formulario para crear
    public function crear()
    {
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->findAll();

        $data = [
            'categorias' => $categorias,
            'header'     => view('Layouts/header'),
            'footer'     => view('Layouts/footer'),
        ];

        return view('productos/crear', $data);
    }

    // Guardar producto
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
            'nombre'       => $this->request->getPost('nombre'),
            'descripcion'  => $this->request->getPost('descripcion'),
            'precio'       => $this->request->getPost('precio'),
            'categoria_id' => $this->request->getPost('categoria_id'),
            'imagen'       => $nombreImagen,
        ];

        $productoModel->insert($datos);
        return redirect()->to(base_url('productos'));
    }

    // Editar producto
    public function editar($id = null)
    {
        $productoModel  = new ProductoModel();
        $categoriaModel = new CategoriaModel();

        $producto = $productoModel->find($id);
        if (!$producto) {
            return redirect()->to(base_url('productos'));
        }

        $categorias = $categoriaModel->findAll();

        $data = [
            'producto'   => $producto,
            'categorias' => $categorias,
            'header'     => view('Layouts/header'),
            'footer'     => view('Layouts/footer'),
        ];

        return view('productos/editar', $data);
    }

    // Actualizar producto
    public function actualizar($id = null)
    {
        $productoModel = new ProductoModel();

        $datos = [
            'nombre'       => $this->request->getPost('nombre'),
            'descripcion'  => $this->request->getPost('descripcion'),
            'precio'       => $this->request->getPost('precio'),
            'categoria_id' => $this->request->getPost('categoria_id'),
        ];

        $imagen = $this->request->getFile('imagen');

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $producto = $productoModel->find($id);
            if ($producto && $producto['imagen']) {
                @unlink('uploads/' . $producto['imagen']);
            }

            $nombreImagen = $imagen->getRandomName();
            $imagen->move('uploads/', $nombreImagen);
            $datos['imagen'] = $nombreImagen;
        }

        $productoModel->update($id, $datos);
        return redirect()->to(base_url('productos'));
    }

    // Eliminar producto
    public function eliminar($id = null)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        if ($producto) {
            // Eliminar la imagen si existe
            if (!empty($producto['imagen']) && file_exists('uploads/' . $producto['imagen'])) {
                @unlink('uploads/' . $producto['imagen']);
            }
            // Eliminar el registro
            $productoModel->delete($id);
        }

        return redirect()->to(base_url('productos'));
    }
}
