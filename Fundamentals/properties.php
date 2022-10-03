<?php
class User {

    public $id =33;
    public $username;
    public $email;
    public $password;

    public function __construct($username, $password){
        // echo "Constructor called";
        $this -> username = $username;
        $this -> password = $password;
    }
    public function register(){
        echo "\nUser Registered.";
    }

    public function login (){
       
        $this -> auth_user();
    }
    public function auth_user (){
        echo "\n$this->username" . "\nis authenticated";
    }
    public function __destruct(){
        // echo "\nDestructor called";
    }
}

$User = new User('brad','1234');
// echo $User->username;
// $User -> register();
$User -> login();
?>