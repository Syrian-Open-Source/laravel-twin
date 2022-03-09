<?php


namespace App\DTO;


class GetResponseData
{

    /**
     * get response data.
     *
     * @param $data
     * @param $message
     * @param $status
     *
     * @return \App\DTO\ResponseData
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     * @author karam mustafa, ali monther
     */
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
