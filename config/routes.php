<?php
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    $routes->applyMiddleware('csrf');

    $routes->connect('/', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/home', ['controller' => 'Pages', 'action' => 'home']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
    $routes->connect('/forgetPassword', ['controller' => 'Users', 'action' => 'forgetPassword']);
    $routes->connect('/view-un-users', ['controller' => 'Pages', 'action' => 'viewUnUsers']);
    $routes->connect('/view-users', ['controller' => 'Pages', 'action' => 'viewUsers']);
    $routes->connect('/view-inactive', ['controller' => 'Pages', 'action' => 'viewInactive']);
    $routes->connect('/profile', ['controller' => 'Pages', 'action' => 'profile']);
    $routes->connect('/requisition', ['controller' => 'Pages', 'action' => 'requisition']);
    $routes->connect('/report', ['controller' => 'Pages', 'action' => 'report']);
    $routes->connect('/analysis', ['controller' => 'Pages', 'action' => 'analysis']);
    $routes->connect('/statistics', ['controller' => 'Pages', 'action' => 'statistics']);
    $routes->connect('/logs/*', ['controller' => 'Logs', 'action' => 'logs']);
    $routes->connect('/add-requisition', ['controller' => 'Requisitions', 'action' => 'addRequisition']);
    $routes->connect('/edit-requisition', ['controller' => 'Requisitions', 'action' => 'editRequisition']);
    $routes->connect('/add-report/*', ['controller' => 'Reports', 'action' => 'addReport']);
    $routes->connect('/change-pass', ['controller' => 'Users', 'action' => 'changePass']);
    $routes->connect('/docs', ['controller' => 'Pages', 'action' => 'docs']);

    $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
