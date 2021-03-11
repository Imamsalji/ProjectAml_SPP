<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable =['id_petugas','nisn','tgl_bayar','bln_bayar','tahun_bayar','id_spp','jumlah_pembayaran'];
    public function spp()
    {
        return $this->belongsTo(siswa::class,'id_spp','id_spp');
    }
    public function petugas()
    {
        return $this->belongsTo(petugas::class,'id_petugas','id');
    }
}
