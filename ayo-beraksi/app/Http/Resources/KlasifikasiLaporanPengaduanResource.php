<?php

namespace App\Http\Resources;

use App\Models\LaporanPengaduan;
use Illuminate\Http\Resources\Json\JsonResource;

class KlasifikasiLaporanPengaduanResource extends JsonResource
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
            'id_pengaduan' => $this->id_pengaduan ? LaporanPengaduan::findOrFail($this->id_pengaduan) : null,
            'klasifikasi' => $this->klasifikasi,
            'kategori' => $this->kategori,
            'keterangan' => $this->keterangan,
        ];
    }
}
