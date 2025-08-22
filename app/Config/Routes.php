<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Rutas para Productos
$routes->get('/productos', 'ProductosController::index');
$routes->get('productos/crear', 'ProductosController::crear');
$routes->post('productos/guardar', 'ProductosController::guardar');
$routes->get('productos/editar/(:num)', 'ProductosController::editar/$1');
$routes->post('productos/actualizar/(:num)', 'ProductosController::actualizar/$1');


// Rutas para Categorías
$routes->get('categorias', 'Categorias::index');         // Listar categorías
$routes->get('categorias/nuevo', 'Categorias::create');  // Form para crear categoría
$routes->post('categorias/guardar', 'Categorias::store'); // Guardar nueva categoría
$routes->get('categorias/editar/(:num)', 'Categorias::edit/$1'); // Form para editar categoría
$routes->post('categorias/actualizar/(:num)', 'Categorias::update/$1'); // Actualizar categoría
$routes->get('categorias/eliminar/(:num)', 'Categorias::delete/$1'); // Eliminar categoría