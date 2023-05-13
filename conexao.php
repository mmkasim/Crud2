<?php
include_once('config.php');

class Conexao
{

    public static $instance;

    private function __construct()
    {
        //
    }

    public static function getConexao()
    {
        $host = HOST_DB;
        $dbname = DBNAME;
        $user = USER_DB;
        $password = PASSWORD_DB;
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }
}