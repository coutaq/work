<?php
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
}
?>