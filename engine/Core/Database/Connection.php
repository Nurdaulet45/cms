<?php

namespace Engine\Core\Database;

class Connection
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect()
    {
        $config = [
            'host' => 'localhost',
            'db_name' => 'iceberg',
            'charset' => 'utf8',
            'username' => 'root',
            'password' => 'root',
        ];
//        $config = require_once 'config.php';
        $dsn = 'mysql:host'. $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' .$config['charset'];
        $this->link = new \PDO($dsn, $config['username'], $config['password']);
        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql)
    {
        $sth = $this->link->prepare($sql);

        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        if ($result === false) {
            return [];
        }
        return $result;
    }
}