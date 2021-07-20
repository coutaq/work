<?php 

require(__DIR__.'/../vendor/autoload.php');
use work\app\auth\auth;
require './views/header.php';
if(!Auth::isAuth()){
    if(isset($_GET['failed'])){
        $errors = json_decode($_GET['failed']);
        if(in_array('fields', $errors)){
            echo '<b>Все поля должны быть заполнены!</b><br/>';
        }
        if(in_array('unique', $errors)){
            echo '<b>Данная почта уже зарегестрирована!</b><br/>';
        }
        if(in_array('@', $errors)){
            echo '<b>Почта должна содержать `@`!</b><br/>';
        }
        if(in_array('.', $errors)){
            echo '<b>Почта должна содержать `.`!</b><br/>';
        }
    }
    require './views/Register.php';
}else{
    require './views/users.php';
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>