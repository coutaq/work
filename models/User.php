<?php
namespace work\models;
use work\database\DB;
class User{
    public $name;
    public $email;
    public $photo;

    public function __construct($name, $email, $photo, $key)
    { 
        $this->name = $name;
        $this->email = $email;
        $this->photo = $photo;
        $this->key = $key;
    }
    public function create($table){
        $query = 'INSERT INTO '.$table.' (name, email, photo, `key`) VALUES ("'.$this->name.'","'.$this->email.'","'.$this->photo.'","'.$this->key.'")';
        if(!mysqli_query(DB::$connection,$query)){
            echo "\n".mysqli_error(DB::$connection);
        }
    }
}
?>