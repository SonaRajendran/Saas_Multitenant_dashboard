<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Auth::login');
$routes->group('auth', function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::doLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::doRegister');
    $routes->get('logout', 'Auth::logout');
});
$routes->group('dashboard', ['filter' => ['auth', 'rbac:view_dashboard', 'tenant']], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});
$routes->group('admin', ['filter' => ['auth', 'rbac:all']], function ($routes) {
    $routes->get('/', 'Admin::index');
});
$routes->group('billing', function ($routes) {
    $routes->post('webhook', 'Billing::webhook'); // Stripe webhook
});