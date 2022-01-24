<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WriterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='Writer';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'date_of_birth'=>$this->resource->date_of_birth,
            'city'=>$this->resource->city
        ];
    }
}
