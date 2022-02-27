<?php


namespace App\DTO;


use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Product\DTO\Feature_DTO\FeatureData;
use Spatie\DataTransferObject\DataTransferObject;
use Symfony\Component\HttpFoundation\Response;

class ResponseData extends DataTransferObject implements Responsable
{

    /**@var string|null*/
    public $message;

    /** @var int */
    public $status = 200;

    public $data;

    /**
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function toResponse($request)
    {
        return response()->json(
            [
                'data' => $this->data ? $this->data->toArray() : null,
                'message' => $this->message,
                'status' => $this->status
            ]
        );
    }
}
