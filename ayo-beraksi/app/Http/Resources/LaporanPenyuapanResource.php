<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class LaporanPenyuapanResource extends JsonResource
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
            'tipe_laporan' => 'Penyuapan',
            'id' => $this->id,
            'nama_terlapor' => $this->nama_terlapor,
            'jabatan' => $this->jabatan,
            'instansi' => $this->instansi,
            'id_pelapor' => $this->id_pelapor ? User::findOrFail($this->id_pelapor) : null,
            'nama_pelapor' => $this->nama_pelapor,
            'jabatan_pelapor' => $this->jabatan_pelapor,
            'instansi_pelapor' => $this->instansi_pelapor,
            'kasus_suap' => $this->kasus_suap,
            'nilai_suap' => $this->nilai_suap,
            'lokasi' => $this->lokasi,
            'tanggal_kejadian' => $this->tanggal_kejadian,
            'tanggal_pelaporan' => $this->tanggal_pelaporan,
            'kronologis_kejadian' => $this->kronologis_kejadian,
            'status' => $this->status,
            'deskripsi_status' => $this->deskripsi_status,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}
