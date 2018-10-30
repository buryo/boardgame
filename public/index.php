<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */


/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * var_dump function
 */
function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

/**
 * Routing
 */
$router = new Core\Router();

/*
 * Add the routes
 * Example
 * Default action is 'index'
 * $router->add('/#route', ['controller' => 'MediaController', 'action' => 'upload']);
 */

$router->add('/', ['controller' => 'Home']);
$router->add('/games', ['controller' => 'GamesController']);
$router->add('/games/delete/{id:\d+}', ['controller' => 'GamesController', 'action' => 'delete']);
$router->add('/games/update/{id:\d+}', ['controller' => 'GamesController', 'action' => 'update']);


/*
Player
*/
$router->add('/players', ['controller' => 'PlayersController']);
$router->add('/add_player', ['controller' => 'UserController', 'action' => 'addUser']);
$router->add('/players/email', ['controller' => 'PlayersController', 'action' => 'setUser']);
$router->add('/players/email/{id:\d+}', ['controller' => 'PlayersController', 'action' => 'email']);
$router->add('/players/delete/{id:\d+}', ['controller' => 'PlayersController', 'action' => 'delete']);

/*
 * Battles
 */
$router->add('/battles', ['controller' => 'BattlesController']);
$router->add('/battles/create', ['controller' => 'BattlesController', 'action' => 'battleCreate']);
$router->add('/battles/create/{id:\d+}', ['controller' => 'BattlesController', 'action' => 'create']);

/*
 * Scores
 */
$router->add('/scores', ['controller' => 'ScoresController']);



$router->dispatch($_SERVER['REQUEST_URI']);

