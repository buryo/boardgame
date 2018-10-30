<?php

namespace App\Models;

use Core\Model;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends Model
{
    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addUser($data)
    {
        try {
            // Get the PDO connection.
            $db = static::getDB();

            // Set PDO Errormode.
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create SQL script.
            // Last_INSERT_ID gets the last incremented id in the Car table.
            $sql = "INSERT INTO players 
                    (nickname, email) 
                    VALUES 
                    (:nickname, :email)";

            // Prepare the SQL query.
            $statement = $db->prepare($sql);

            // Execute the previous statement.
            $statement->execute(['nickname' => $data['nickname'], 'email' => $data['email']]);

            // Redirect.
            header("Location: /players");

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
