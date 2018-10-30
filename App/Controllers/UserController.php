<?php
/**
 * User: Burak
 * Date: 26-Oct-18
 * Time: 16:28
 */

namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use \Core\View;

class UserController extends Controller
{
    public function addUser()
    {
        User::addUser($_POST);
        // Store the message into the session.
        $_SESSION['message'] = 'Speler is succesvol aangemaakt!';
    }
}