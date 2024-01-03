<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
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
            'id_pengguna' => $this->id_pengguna ? User::findOrFail($this->id_pengguna) : null,
            'nama_pengguna' => $this->nama_pengguna,
            'bintang_kepuasan' => $this->bintang_kepuasan,
            'respon_kepuasan' => $this->respon_kepuasan,
            'alasan' => $this->alasan,
        ];
    }
}
