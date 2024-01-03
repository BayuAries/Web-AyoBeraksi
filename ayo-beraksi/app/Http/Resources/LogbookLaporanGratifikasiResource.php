<?php

namespace App\Http\Resources;

use App\Models\AnalisisLaporanGratifikasi;
use App\Models\LaporanGratifikasi;
use Illuminate\Http\Resources\Json\JsonResource;

class LogbookLaporanGratifikasiResource extends JsonResource
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
            'id_gratifikasi' => $this->id_gratifikasi ? LaporanGratifikasi::findOrFail($this->id_gratifikasi) : null,
            'id_analisis_gratifikasi' => $this->id_analisis_gratifikasi ? AnalisisLaporanGratifikasi::findOrFail($this->id_analisis_gratifikasi) : null,
            'hasil_analisis' => $this->hasil_analisis,
            'keterangan' => $this->keterangan,
        ];
    }
}
