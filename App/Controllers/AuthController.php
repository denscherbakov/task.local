<?php

namespace App\Controllers;

use App\Controller;
use App\Model\User;

class AuthController extends Controller
{
    /**
     * Validate user data and redirect to index page or products page
     * @return redirect
     */
    public function actionLogin()
    {
        $login = $this->validate($_POST['login']);
        $pass = $this->validate($_POST['pass']);

        $user = new User();

        if ($user->auth($login, $pass) === false) {
            return header('Location: /');
        };

        return header('Location: /product');
    }

    /**
     * Logout
     */
    public function actionLogout()
    {
        unset($_SESSION['auth']);
        return header('Location: /');
    }
}