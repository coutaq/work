<?php
namespace work\database;
class DB{
    public static $connection;
    public static $isConnected = false;
    public static $error;
    public static function connect(){
        include './config/db.php';
        switch($db_server){
            case "mysql":
                self::$connection = mysqli_connect($db_url, $db_user, $db_password, $db_name);
                if(!self::$connection){
                    self::$error =  "SQL ОШИБКА ".mysqli_connect_errno().":".mysqli_connect_error();
                }else{
                    self::$isConnected = true;
                }
            break;
            default:
                echo("Такая база данных не поддерживается");
        };
    }
}
?>