<?php

namespace App\Http\Resources;

use App\Models\LaporanPenyuapan;
use Illuminate\Http\Resources\Json\JsonResource;

class LogbookLaporanPenyuapanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_penyuapan' => $this->id_penyuapan ? LaporanPenyuapan::findOrFail($this->id_penyuapan) : null,
            'uraian_kejadian' => $this->uraian_kejadian,
            'saksi' => $this->saksi,
        ];
    }
}
