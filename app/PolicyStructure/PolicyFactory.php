<?php


namespace App\PolicyStructure;


/**
 * Class PolicyFactory
 *
 * @author karam mustafa, ali monther
 * @package App\PolicyStructure
 */
class PolicyFactory
{

    /**
     * class name
     * @author karam mustafa, ali monther
     * @var string
     */
    private $className ;

    /**
     * PolicyFactory constructor.
     *
     * @param $type
     */
    public function __construct($type){
        $this->className = "App\\PolicyStructure\\" .$type;
    }

    /**
     * check if this class is accessible.
     *
     * @return mixed
     * @author karam mustafa, ali monther
     */
    public  function check(){
        $class = new $this->className();
        return $class->is_enabled();
    }
}
