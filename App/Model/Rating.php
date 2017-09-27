<?php

namespace App\Model;

use App\Db;
use App\Model;

class Rating extends Model
{
    public static $table = 'ratings';

    public $rate;
    public $user_id;
    public $product_id;

    public function update($data)
    {
        $db = new Db();
        $data = $db->execute('UPDATE ' . self::$table .
            ' SET rate=:rate, product_id=:product_id, user_id=:user_id WHERE product_id=:product_id AND user_id=:user_id',
            [
                'product_id' => $data['product_id'],
                'user_id' => $data['user_id'],
                'rate' => $data['rating']
            ]);
        return $data;
    }
}