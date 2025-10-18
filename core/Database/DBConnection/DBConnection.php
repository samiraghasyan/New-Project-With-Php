<?php
namespace Core\Database\DBConnection;

use PDO;
use PDOException;
class DBConnection
{
    private static $dbconnection_instance = null;

    private function __construct()
    {

    }

    public static function getDbConnectionInstance()
    {
        if(self::$dbconnection_instance == null){
            $dbConnectionInstance = new DBConnection();
            self::$dbconnection_instance = $dbConnectionInstance->dbConnection();
        }else{
            return self::$dbconnection_instance;
        }
    }

    private function dbConnection(){

        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        try{
            return new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSERNAME, DBPASS, $options);
        }
        catch (PDOException $e){
            echo "error in database connection: " . $e->getMessage();
            return false;
        }

    }

    public static function newInsertedID()
    {
        return self::getDBConnectionInstance()->lastInsertId();
    }
}