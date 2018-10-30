<?php
/**
 * User: Burak
 * Date: 29-Oct-18
 * Time: 17:24
 */

namespace App\Models;

use Core\Model;
use PDO;

class Battles extends Model
{
    /**
     * @param $data
     */
    public static function create($data, $totalScore, $wonById)
    {
        try {
            // Get the PDO connection.
            $db = static::getDB();

            // Set PDO Errormode.
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create SQL script.
            $sql = "INSERT INTO battles 
            (dtPlayed, gameid, playerid01, playerid02, playerid03, playerid04, wonby, totalScore) 
            VALUES (NOW(), :gameid, :player1, :player2, :player3, :player4, :wonby, :totalScores)";

            // Prepare the SQL query.
            $statement = $db->prepare($sql);

            // Execute the previous statement.
            $statement->execute([
                'gameid' => $data['gameId'],
                'player1' => $data['player1'],
                'player2' => $data['player2'],
                'player3' => $data['player3'],
                'player4' => $data['player4'],
                'wonby' => $wonById,
                'totalScores' => $totalScore
            ]);

            // Redirect.
            header("Location: /battles");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}