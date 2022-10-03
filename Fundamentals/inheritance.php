<?php
class First{
    protected $id = 23;
    protected $name = '<br/>John Doe';

    public function SaySomething(){
        echo '<br/>Something...<br/>';
    }
}

class Second extends First{

    public function SaySomethingElse(){
        // echo 'Something Else...';
    }
    public function getName(){
        echo $this->name;
    }
}

$second = new Second;
// echo $second->id;
echo $second->getName();
// $second->SaySomething();
// $second->SaySomethingElse();

?>