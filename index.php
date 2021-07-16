<?php 
namespace work;
require 'database/DB.php';
use work\database\DB;
require 'models/User.php';
use work\models\User;
DB::connect();
if(!DB::$isConnected){
    echo DB::$error;
}

$user = new User("Test", "test@gmail.com", "phphphp", "ддд");
$user->create('users');
?>
