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
use App\Models\Scores;
use Core\Controller;
use Core\View;

class ScoresController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $scores = Scores::getAllScores();
        $games = Scores::QuantityGamesPlayed();
        View::render('Back/pages/scores/index.php', ['scores' => $scores, 'games' => $games]);
    }

}