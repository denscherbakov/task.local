<?php

namespace App\Model;

use App\Db;
use App\Model;

class Comment extends Model
{
    public static $table = 'comments';

    public $comment;
    public $product_id;
    public $user_id;

    /**
     * @param $data
     * @return bool
     */
    public function update($data)
    {
        $db = new Db();
        $data = $db->execute('UPDATE ' . self::$table .
            ' SET comment=:comment, product_id=:product_id, user_id=:user_id WHERE product_id=:product_id AND user_id=:user_id',
            [
                'product_id' => $data['product_id'],
                'user_id' => $data['user_id'],
                'comment' => $data['comment']
            ]);
        return $data;
    }

}