<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc.
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {

        $builder->connect('/', ['controller' => 'Usuarios', 'action' => 'add']);
        $builder->connect('/pages/*', 'Pages::display');

        $builder->connect('/login', ['controller' => 'Usuarios', 'action' => 'login']);
        $builder->connect('/logout', ['controller' => 'Usuarios', 'action' => 'logout']);

        $builder->get('/email-teste', ['controller' => 'Inscricoes', 'action' => 'enviarEmailTeste']);

        $builder->connect('/usuarios', ['controller' => 'Usuarios', 'action' => 'index']);
        $builder->connect('/usuarios/view/*', ['controller' => 'Usuarios', 'action' => 'view']);
        $builder->connect('/usuarios/add', ['controller' => 'Usuarios', 'action' => 'add']);
        $builder->connect('/usuarios/edit/*', ['controller' => 'Usuarios', 'action' => 'edit']);
        $builder->connect('/usuarios/delete/*', ['controller' => 'Usuarios', 'action' => 'delete']);

        $builder->connect('/eventos', ['controller' => 'Eventos', 'action' => 'index']);
        $builder->connect('/eventos/view/*', ['controller' => 'Eventos', 'action' => 'view']);
        $builder->connect('/eventos/add', ['controller' => 'Eventos', 'action' => 'add']);
        $builder->connect('/eventos/edit/*', ['controller' => 'Eventos', 'action' => 'edit']);
        $builder->connect('/eventos/delete/*', ['controller' => 'Eventos', 'action' => 'delete']);

        $builder->post('/inscricoes/checkin/*', ['controller' => 'Inscricoes', 'action' => 'checkin']);
        $builder->post('/inscricoes/cancel-checkin/:id', ['controller' => 'Inscricoes', 'action' => 'cancelCheckin'])->setPass(['id']);
        $builder->connect('/inscricoes', ['controller' => 'Inscricoes', 'action' => 'index']);
        $builder->connect('/inscricoes/view/*', ['controller' => 'Inscricoes', 'action' => 'view']);
        $builder->connect('/inscricoes/add', ['controller' => 'Inscricoes', 'action' => 'add']);
        $builder->connect('/inscricoes/edit/*', ['controller' => 'Inscricoes', 'action' => 'edit']);
        $builder->connect('/inscricoes/delete/*', ['controller' => 'Inscricoes', 'action' => 'delete']);

        $builder->connect('/certificados', ['controller' => 'Certificados', 'action' => 'index']);
        $builder->connect('/certificados/view/*', ['controller' => 'Certificados', 'action' => 'view']);
        $builder->connect('/certificados/add', ['controller' => 'Certificados', 'action' => 'add']);
        $builder->connect('/certificados/edit/*', ['controller' => 'Certificados', 'action' => 'edit']);
        $builder->connect('/certificados/delete/*', ['controller' => 'Certificados', 'action' => 'delete']);

        $builder->connect('/presencas', ['controller' => 'Presencas', 'action' => 'index']);
        $builder->connect('/presencas/view/*', ['controller' => 'Presencas', 'action' => 'view']);
        $builder->connect('/presencas/add', ['controller' => 'Presencas', 'action' => 'add']);
        $builder->connect('/presencas/edit/*', ['controller' => 'Presencas', 'action' => 'edit']);
        $builder->connect('/presencas/delete/*', ['controller' => 'Presencas', 'action' => 'delete']);

        $builder->connect('/logs', ['controller' => 'Logs', 'action' => 'index']);
        $builder->connect('/logs/view/*', ['controller' => 'Logs', 'action' => 'view']);
        $builder->connect('/logs/add', ['controller' => 'Logs', 'action' => 'add']);
        $builder->connect('/logs/edit/*', ['controller' => 'Logs', 'action' => 'edit']);
        $builder->connect('/logs/delete/*', ['controller' => 'Logs', 'action' => 'delete']);

        $builder->fallbacks();
    });
};