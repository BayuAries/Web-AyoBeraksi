<?php

namespace App\Http\Resources;

use App\Models\LaporanGratifikasi;
use Illuminate\Http\Resources\Json\JsonResource;

class AnalisisLaporanGratifikasiResource extends JsonResource
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
            'jenis_gratifikasi' => $this->jenis_gratifikasi,
            'nilai_gratifikasi' => $this->nilai_gratifikasi,
            'frekuensi_pelapor' => $this->frekuensi_pelapor,
            'tujuan' => $this->tujuan,
            'status_batas' => $this->status_batas,
            'status_frekuensi' => $this->status_frekuensi,
            'rekomendasi_tindak_lanjut' => $this->rekomendasi_tindak_lanjut,
        ];
    }
}
