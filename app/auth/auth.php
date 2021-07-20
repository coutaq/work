<?php
namespace work\app\auth;
class Auth{
    public static function isAuth(){
        if(!isset($_SESSION)) 
        {
            session_start();
        }
        return isset($_SESSION['id']);
    }
    public static function logout(){
        session_destroy();
    }
}
?> 