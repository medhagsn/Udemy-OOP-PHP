<?php
class User{
    public $username;
    public static $minPassLength = 10;
    public static function validatePassword($password){
    if (strlen($password)>=self::$minPassLength){
        return true;
    } else {
        return false;
    }
    }
}

// $password = 'pass';
// if (User::validatePassword($password)){
//     echo 'Paassword is valid.';
// } else {
//     echo 'Password is not valid.';
// }

echo User::$minPassLength;
?>

<!-- 
The "this" keyword is used as a reference to
an instance. Since the static methods doesn't
have (belong to) any instance you cannot use 
the "this" reference within a static method. -->