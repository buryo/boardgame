<?php
/**
 * User: Burak
 * Date: 27-Oct-18
 * Time: 20:17
 */

namespace App\Models;

use Core\Model;
use PDO;

class Games extends Model
{
    /**
     * Get all the games as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM games');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getGame($id)
    {
        try{
            // Get the PDO connection.
            $db = static::getDB();

            // Set PDO Errormode.
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create SQL script.
            $sql = "SELECT * FROM boardgame.games WHERE games.id = :id;";

            // Prepare the SQL query.
            $statement = $db->prepare($sql);

            // Execute the previous statement.
            $statement->execute(['id' => $id]);
            $player = $statement->fetch();
            return $player;
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}