<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap="books";
    public function toArray($request)
    {
        return [
            'writer'=>new WriterResource($this->resource->writer),
            'genre'=>new GenreResource($this->resource->genre),
            'title'=>$this->resource->title
        ];
    }
}
