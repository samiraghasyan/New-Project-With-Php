<?php
namespace core\Database\DBConnection;

use PDO;
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

    public function dbConnection()
    {
        $server_name = DBHOST;
        $database = DBNAME;
        $user_name = DBUSERNAME;
        $pass = DBPASS;
        try {
            $conn = new PDO("mysql:$server_name;dbname:$database",$user_name,$pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo  'Connect success';
        }catch (\PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public static function newInsertedID()
    {
        return self::getDbConnectionInstance()->lastInsertedId();
    }
}