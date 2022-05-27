<?php

// connexion à MySql

class myPDO{
    private const HOST_NAME = "localhost";
    private const DB_NAME = "gbaf_extranet";
    private const USER_NAME = "root";
    private const PWD = "root";

    private static $db = null;

    public static function dbConnect(){
        if(is_null(self::$db)){
            try
            {
                $connexion = 'mysql:host='.self::HOST_NAME.';dbname='.self::DB_NAME;
               self::$db = new PDO($connexion,self::USER_NAME,self::PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(PDOException $e)
            {
                die('Erreur de connexion : '.$e->getMessage());
            }
            self::$db->exec("SET CHARACTER SET UTF8");
        }
        return self::$db;
    }
}

?>