<?php


namespace App\Controllers;

use App\Models\Games;
use \Core\View;
use Core\Controller;


class GamesController extends Controller
{
    public function index()
    {
        $games = Games::getAll();
        View::render('Back/pages/games/index.php', ['games' => $games]);
    }
}