<?php


namespace App\PolicyStructure;


abstract class IPolicy
{

    /**
     * check if the hasRole and has permissions are passed.
     *
     * @return int
     * @author karam mustafa
     */
    public function is_enabled(){

        return $this->hasRole() & $this->hasPermissions();

    }

    /**
     * check if user has a role.
     *
     * @return mixed
     * @author karam mustafa, ali monther
     */
    abstract public function hasRole();

    /**
     * check if user has permissions
     *
     * @return mixed
     * @author karam mustafa, ali monther
     */
    abstract public function hasPermissions();

}
