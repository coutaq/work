<?php
namespace work\app\controllers;
require(__DIR__.'/../../vendor/autoload.php');

use work\app\models\User;
use work\app\database\DB;
use work\app\requests\RegisterRequest;

if(!DB::$isConnected){
  DB::connect();
}
$req = new RegisterRequest($_POST['name'],$_POST['email'],$_POST['photo'],$_POST['key']);
$validated = $req->validate();
if ($validated === TRUE) {
    $user = new User($req);
    echo $user->create(DB::getConnection(), 'users');
    if(!false){
   echo "logged in!";
      header('Location: /work/web');
      session_start();
      $_SESSION['id'] = $user->getId();
    }
  } else{
    header('Location: /work/web?failed='.$validated);
  }
?>


