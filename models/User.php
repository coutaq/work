<?php
namespace work\models;
require 'database/DB.php';

use mysqli;
use work\database\DB;
class User{
    public $name;
    public $email;
    public $photo;

    public function __construct($name, $email, $photo)
    { 
        $this->name = $name;
        $this->email = $email;
        $this->photo = $photo;
    }
    public function create($table){
        echo "создаем";
        $query = 'INSERT INTO '.$table.' (name, email, photo) VALUES ('.$this->name.','.$this->email.','.$this->photo.')';
        if(mysqli_query(DB::$connection,$query)){
            echo "пользователь добавлен";
        }else{
            echo mysqli_error(DB::$connection);
        }
    }
}
?>