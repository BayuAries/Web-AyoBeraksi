<?php

namespace App\Http\Resources;

use App\Models\LogbookLaporanGratifikasi;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LogbookLaporanGratifikasiCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return LogbookLaporanGratifikasiResource::collection($this->collection);
    }
}
