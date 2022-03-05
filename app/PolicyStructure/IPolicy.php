<?php


namespace App\PolicyStructure;


abstract class IPolicy
{

    public function is_enabled(){

        return $this->hasRole() & $this->hasPermissions();

    }
    abstract public function hasRole();
    abstract public function hasPermissions();

}
