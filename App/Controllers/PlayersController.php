<?php

namespace App\Controllers;


use App\Models\Players;
use Core\Controller;
use Core\View;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Players::getAllPlayers();
        View::render('Back/Pages/players/index.php', ['players' => $players]);
    }

    public function delete($id)
    {
        Players::delete($id);
        // Store the message into the session.
        $_SESSION['message'] = 'Speler is succesvol verwijderd!';
    }

    public function email($id)
    {
        $player = Players::getPlayer($id);
        View::render('Back/Pages/players/email.php', ['player' => $player]);
    }

    public function setUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            Players::setUser($_POST);
        }
    }
}