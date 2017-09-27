<?php

namespace App;

abstract class Model
{
    public static $table;

    /**
     * @return array|bool
     * Get all data from table.
     */
    public static function findAll()
    {
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . static::$table,
                            [],
                            static::class);
        return $data;
    }

    /**
     * @param $id
     * @return array|bool
     */
    public static function findById($id)
    {
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . static::$table . ' WHERE id=:id',
            ['id' => $id],
            static::class);
        return $data[0];
    }

    /**
     * @param $userId
     * @return array|bool
     * @internal param $id
     */
    public static function byCurrentUser($userId)
    {
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . static::$table . ' WHERE user_id=:user_id',
            ['user_id' => $userId],
            static::class);
        return $data;
    }

    /**
     * @param $product_id
     * @param $user_id
     * @return array|bool
     */
    public static function check($product_id, $user_id)
    {
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . static::$table . ' WHERE product_id=:product_id AND user_id=:user_id',
            ['product_id' => $product_id, 'user_id' => $user_id],
            static::class);
        return $data;
    }

    /**
     * @param $data
     * @return bool
     * Save data to table.
     */
    public function insert($data)
    {
        $columns = [];
        $binds = [];

        foreach ($this as $column => $value){
            $columns[] = $column;
            $binds[] = ':' . $column;
        }

        $sql = 'INSERT INTO ' . static::$table .
            ' (' . implode(', ', $columns) .
            ') VALUES (' .
            implode(', ', $binds) . ')';
        $db = new Db();
        $db->execute($sql, $data);

        return true;
    }
}