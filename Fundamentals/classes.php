<?php
class User {

    public function __construct(){
        echo "Constructor called";
    }
    public function register(){
        echo "\nUser Registered";
    }

    public function login ($username, $password){
        echo "\n$username" . "\nis now logged in";
    }
    public function __destruct(){
        echo "\nDestructor called";
    }
}

$User = new User;
$User -> register();
$User -> login('brad','1234');
?>