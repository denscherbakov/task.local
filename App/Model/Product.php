<?php

namespace App\Model;

use App\Db;
use App\Model;

class Product extends Model
{
    public static $table = 'products';

    public $name;
    public $description;
    public $price;

    /**
     * Get all product comments
     * @param $id
     * @return array|bool
     */
    public static function getComments($id)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT c.* FROM comments as c JOIN ' . self::$table .
            ' as p ON p.id = c.product_id WHERE p.id=:id',
            ['id' => $id],
            static::class);
        return $data;
    }

    /**
     * Get all priduct rates
     * @param $id
     * @return array|bool
     */
    public static function getRates($id)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT r.* FROM ratings as r JOIN ' . self::$table .
            ' as p ON p.id = r.product_id WHERE p.id=:id',
            ['id' => $id],
            static::class);
        return $data;
    }
}