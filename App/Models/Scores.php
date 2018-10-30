<?php
/**
 * User: Burak
 * Date: 29-Oct-18
 * Time: 17:24
 */

namespace App\Models;


use Core\Model;
use PDO;

class Scores extends Model
{
    public static function getAllScores()
    {
        try{
            $db = static::getDB();

            $stmt = $db->query('SELECT dtPlayed, gameid, totalScore, games.name, players.nickname
                                FROM boardgame.battles 
                                JOIN games ON battles.gameid = games.id
                                JOIN players ON battles.wonby = players.id;');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getHighScore()
    {

    }

    public static function QuantityGamesPlayed()
    {
        try{
            $db = static::getDB();

            $stmt = $db->query('SELECT games.name, COUNT(battles.gameid) as count FROM boardgame.games
                                LEFT JOIN boardgame.battles on battles.gameid = games.id
                                group by games.id;');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}