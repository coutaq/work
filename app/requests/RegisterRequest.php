<?php
namespace work\app\requests;
// require(__DIR__.'/../../vendor/autoload.php');
use work\app\database\DB;
class RegisterRequest{
    private $name;
    private $email;
    private $photo;
    private $key;
    public function __construct($name, $email, $photo, $key){
        $this->name = $name;
        $this->email = $email;
        $this->photo = $photo;
        $this->key = $key;
    }
    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function getKey(){
        return $this->key;
    }
    public function validate(){
        $errors = array();
        $email = $this->validate_email();
        if($email !== TRUE){
            $errors = $email;
        }
        if(!$this->validate_fields()){
            array_push($errors, "fields");
        }
        return count($errors) ==0? true:json_encode($errors);
    }  
    private function validate_email(){
        $errors = array();
        $query = ' SELECT * FROM users WHERE email = "'.$this->email.'"';
        $result =  DB::getConnection()->query($query, MYSQLI_STORE_RESULT);
        if($result->num_rows){
            array_push($errors, "unique");
        }
        if(!strpos($this->email, '@')){
            array_push($errors, "@");
        }
        if(!strpos($this->email, '.')){
            array_push($errors, ".");
        }
        return count($errors)==0? true: $errors;
    }
    private function validate_fields(){
        return !(Empty($this->name) || Empty($this->email) || Empty($this->photo) || Empty($this->key));
    }
    
}
?>