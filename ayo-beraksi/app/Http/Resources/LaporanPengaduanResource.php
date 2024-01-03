<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class LaporanPengaduanResource extends JsonResource
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
            'tipe_laporan' => 'Pengaduan',
            'id' => $this->id,
            'nama_ketua' => $this->nama_ketua,
            'id_pelapor' => $this->id_pelapor ? User::findOrFail($this->id_pelapor) : null,
            'nama_pelapor' => $this->nama_pelapor,
            'alamat' => $this->alamat,
            'nik' => $this->nik,
            'uraian_laporan' => $this->uraian_laporan,
            'saran_masukan' => $this->saran_masukan,
            'tanggal_pengaduan' => $this->tanggal_pengaduan,
            'status' => $this->status,
            'deskripsi_status' => $this->deskripsi_status,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}
