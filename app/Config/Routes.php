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
$routes->get('productos/eliminar/(:num)', 'ProductosController::eliminar/$1');

$routes->get('productos', 'ProductosController::index');
$routes->get('productos/listar', 'ProductosController::listar');
$routes->get('productos/crear', 'ProductosController::crear');
$routes->post('productos/guardar', 'ProductosController::guardar');
$routes->get('productos/editar/(:num)', 'ProductosController::editar/$1');
$routes->post('productos/actualizar/(:num)', 'ProductosController::actualizar/$1');
$routes->get('productos/eliminar/(:num)', 'ProductosController::eliminar/$1');


