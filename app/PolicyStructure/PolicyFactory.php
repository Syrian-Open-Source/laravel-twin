<?php


namespace App\PolicyStructure;


class PolicyFactory
{

    private $class_name ;

    public function __construct($type){
        $this->class_name = "App\\PolicyStructure\\" .$type;
    }

    public  function check(){
        $class = new $this->class_name();
        return $class->is_enabled();
    }
}
