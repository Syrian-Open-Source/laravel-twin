<?php


namespace App\DTO;


class GetResponsePaginationData
{

    public static function getResponsePaginationData($paginator , $collection , $caster){

        return new ResponsePaginationData(
            [
                'paginator' =>$paginator,
                'collection'=>$collection,
                'caster'=>$caster
            ]
        );
    }
}
