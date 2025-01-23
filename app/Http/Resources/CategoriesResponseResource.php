<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoriesResource;

class CategoriesResponse extends JsonResource
{
    public function __construct($resource, $responseCode = 200, $responseMessage = 'Success')
    {
        parent::__construct($resource);
        $this->responseCode = $responseCode;
        $this->responseMessage = $responseMessage;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'responseCode' => $this->responseCode,
            'responseMessage' => $this->responseMessage,
            'result' => $this->resource ? new CategoriesResource($this->resource) : null
        ];
    }
}
