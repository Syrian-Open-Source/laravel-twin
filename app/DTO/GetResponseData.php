<?php


namespace App\DTO;


class GetResponseData
{

    public static function getResponseData($data , $message , $status)
    {
        return new ResponseData(
            [
                'data' =>$data,
                'message' =>$message,
                'status' =>$status,
            ]
        );
    }

}
