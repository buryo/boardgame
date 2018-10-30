<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $players = User::getAll();
        View::render('Back/index.php', ['players' => $players]);
    }
}
