<?php
namespace work\app\models;

class User{
    private $id;
    private $name;
    private $email;
    private $photo;

    public function __construct($request)
    { 
        $this->name = $request->getName();
        $this->email = $request->getEmail();
        $this->photo = $request->getPhoto();
        $this->key = $request->getKey();
    }
    public function create($db, $table){
        $query = 'INSERT INTO '.$table.' (name, email, photo, `key`) VALUES ("'.$this->name.'","'.$this->email.'","'.$this->photo.'","'.$this->key.'");';
        $result =  $db->query($query, MYSQLI_USE_RESULT);
        $query = ' SELECT LAST_INSERT_ID();';
        $result =  $db->query($query, MYSQLI_USE_RESULT);
        $this->id = $result->fetch_row()[0];
        return $this->id;
    }

    public function getId(){
        return $this->id;
    }


}
?>