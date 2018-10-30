<?php
/**
 * User: Burak
 * Date: 27-Oct-18
 * Time: 19:44
 */

namespace App\Controllers;


use App\Models\Battles;
use App\Models\Games;
use App\Models\Players;
use Core\Controller;
use Core\View;

class BattlesController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $games = Games::getAll();
        View::render('Back/pages/battles/index.php', ['games' => $games]);
    }


    /**
     * @param $id
     * @throws \Exception
     */
    public function create($id)
    {
        $game = Games::getGame($id);
        $players = Players::getAllPlayers();
        View::render('Back/pages/battles/create.php', ['game' => $game, 'players' => $players]);
    }

    /**
     * creates battle and battle details
     */
    public function battleCreate()
    {
        if ($_POST) {
            $scoresArray = array();
            $totalScore = $_POST['player1Point'] + $_POST['player2Point'] + $_POST['player3Point'] + $_POST['player4Point'];
            array_push($scoresArray, $_POST['player1Point'], $_POST['player2Point'], $_POST['player3Point'], $_POST['player4Point']);

//          get highest value
            $winnerPoint = max($scoresArray);

            switch ($winnerPoint) {
                case $_POST['player1Point']:
                    $winner = $_POST['player1'];
                    break;
                case $_POST['player2Point']:
                    $winner = $_POST['player2'];
                    break;
                case $_POST['player3Point']:
                    $winner = $_POST['player3'];
                    break;
                case $_POST['player4Point']:
                    $winner = $_POST['player4'];
                    break;
                default:
                    $winner = empty($winner);
            }
            Battles::create($_POST, $totalScore, $winner);
        } else {
            $_SESSION['message'] = 'Er is wat mis gegaan probeer het opnieuw';
            // Redirect.
            header("Location: /battles");
        }
    }
}