<?php


namespace App\DTO;


use App\DTO\CasterImp\CasterImp;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Caster;
use Spatie\DataTransferObject\DataTransferObject;
use Symfony\Component\HttpFoundation\Response;

 final  class ResponsePaginationData  extends DataTransferObject implements Responsable
{
    /** @var \Illuminate\Pagination\LengthAwarePaginator */
    public $paginator;

    public  $collection;
    /** @var integer*/
    public $status = 200;
    /* @var string|null**/
    public $message;

    public $caster;

    /**
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function toResponse($request)
    {

        return $this->responseData($this->caster);
    }


    public function responseData(array $caster){
        return response()->json(
            [
                'data' =>$caster,
                'message' => $this->message,
                'status' => $this->status,
                'meta' =>
                    $this->paginator ?
                        [
                            'currentPage' => (int)$this->paginator->currentPage(),
                            'baseUrl' => $this->paginator->path(),
                            'nextPageUrl' => $this->paginator->nextPageUrl(),
                            'previousPageUrl' => $this->paginator->previousPageUrl(),
                            'lastPage' => (int)$this->paginator->lastPage(),
                            'perPage' => (int)$this->paginator->perPage(),
                            'total' => (int)$this->paginator->total(),
                        ] :
                        null,
            ]
        );
    }
}
