<?php

class db_connection
{
    public function connect()
    {
        $host = 'localhost';
        $username= 'root';
        $password = '';
        $db = 'pack2paradise';
        $connection = mysqli_connect($host, $username, $password, $db);
        return $connection;
    }
}