<?php
/**
 * User: Burak
 * Date: 27-Oct-18
 * Time: 21:09
 */

namespace App\Models;

use Core\Model;
use PDO;

class Players extends Model
{
    public static function delete($id)
    {
        try{
            // Get the PDO connection.
            $db = static::getDB();

            // Set PDO Errormode.
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //get user
            $sql2 = "SELECT * FROM users where id = :id";
            $statement2 = $db->prepare($sql2);
            $statement2->bindParam(':id', $id);
            $statement2->execute();
            $statement2->setFetchMode(PDO::FETCH_ASSOC);
            $result = $statement2->fetch();

            //set registered '0'
            $sql3 = "UPDATE players SET registered = 0 WHERE email = :email";
            $statement3 = $db->prepare($sql3);
            $statement3->bindParam(':email', $result['email']);
            $statement3->execute();


            // Create SQL script.
            $sql = "DELETE FROM users WHERE id = :id";

            // Prepare the SQL query.
            $statement = $db->prepare($sql);

            // Execute the previous statement.
            $statement->execute(['id' => $id]);

            // Redirect.
            header("Location: /");
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getAllPlayers()
    {
        try{
            // Get the PDO connection.
            $db = static::getDB();

            // Set PDO Errormode.
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create SQL script.
            $sql = "SELECT * FROM boardgame.players;";

            // Prepare the SQL query.
            $statement = $db->prepare($sql);

            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $players = $statement->fetchAll();
            return $players;
            // Redirect.
            header("Location: /");
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getPlayer($id)
    {
        try{
            // Get the PDO connection.
            $db = static::getDB();

            // Set PDO Errormode.
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create SQL script.
            $sql = "SELECT * FROM boardgame.players WHERE players.id = :id;";

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

    public static function setUser($data)
    {
        try {
            // Get the PDO connection.
            $db = static::getDB();

            // Set PDO Errormode.
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create SQL script.
            $sql = "INSERT IGNORE INTO users (fname, lname, email, birthday) VALUES (:fname, :lname, :email, :birthday);
                    UPDATE players SET registered = 1 WHERE email = :email";

            // Prepare the SQL query.
            $statement = $db->prepare($sql);

            // Execute the previous statement.
            $statement->execute(['fname' => $_POST['fname'], 'lname' => $_POST['lname'], 'email' => $_POST['email'], 'birthday' => $_POST['birthday']]);

            // Redirect.
            header("Location: /players");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}