<?php
/**
 * Created by PhpStorm.
 * AuthController: Papka
 * Date: 26.09.2017
 * Time: 23:35
 */

namespace App\Model;

use App\Db;
use App\Model;

class User extends Model
{
    public static $table = 'users';

    public $id;
    public $login;
    public $pass;
    public $email;

    /**
     * Check user and create session
     * @param $login
     * @param $pass
     * @return bool
     */
    public function auth($login, $pass)
    {
        $user = $this->checkAuth($login, $pass);

        if ($user === false) return false;

        return $_SESSION['auth'] = $user;
    }

    /**
     * Find user by login
     * @param $login
     * @return array|bool
     */
    protected function findByLogin($login)
    {
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . self::$table . ' WHERE login=:login',
                            ['login' => $login],
                            static::class);
        return $data[0];
    }

    /**
     * @return bool
     */
    public static function getId()
    {
        foreach ($_SESSION['auth'] as $key => $item){
            if ($key == 'id') return $item;
        };
        return false;
    }

    /**
     * Check user
     * @param $login
     * @param $pass
     * @return bool | object
     */
    protected function checkAuth($login, $pass)
    {
        $user = $this->findByLogin($login);

        if (!$user || $user->pass != $pass) return false;

        return $user;
    }
}