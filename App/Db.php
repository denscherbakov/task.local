<?php

namespace App;

class Db
{
    protected $dbh;

    /**
     * Db constructor.
     * Get settings and connect to db. Use pdo.
     */
    public function __construct()
    {
        $config = Config::instance();
        $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] .
                               ';dbname=' . $config->data['db']['dbname'],
                                $config->data['db']['user'],
                                $config->data['db']['pass']);
    }

    /**
     * @param $query
     * @param array $params
     * @return bool
     */
    public function execute($query, array $params = [])
    {
        $sth = $this->dbh->prepare($query);
        $result = $sth->execute($params);
        return $result;
    }

    /**
     * @param $query
     * @param array $params
     * @param null $class
     * @return array|bool
     */
    public function query($query, array $params = [], $class = null)
    {
        $sth = $this->dbh->prepare($query);
        $result = $sth->execute($params);
        if (false === $result){
            return false;
        }
        if (null === $class){
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }
}