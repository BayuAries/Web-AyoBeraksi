<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class LaporanGratifikasiResource extends JsonResource
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
            'tipe_laporan' => 'Gratifikasi',
            'id' => $this->id,
            'no_laporan' => $this->no_laporan,
            'pengirim' => $this->pengirim,
            'id_pelapor' => $this->id_pelapor ? User::findOrFail($this->id_pelapor) : null,
            'nama_pelapor' => $this->nama_pelapor,
            'nama_terlapor' => $this->nama_terlapor,
            'jabatan' => $this->jabatan,
            'instansi' => $this->instansi,
            'tanggal_kejadian' => $this->tanggal_kejadian,
            'tanggal_pelaporan' => $this->tanggal_pelaporan,
            'kronologis_kejadian' => $this->kronologis_kejadian,
            'status' => $this->status,
            'deskripsi_status' => $this->deskripsi_status,
            'tindaklanjut' => $this->tindaklanjut,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}
