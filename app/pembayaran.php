<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable =['id_petugas','nisn','tgl_bayar','bulan_dibayar','tahun_dibayar','id_spp','jumlah_pembayaran','status'];
    public function spp()
    {
        return $this->belongsTo(siswa::class,'id_spp','id_spp');
    }
    public function petugas()
    {
        return $this->belongsTo(User::class,'id_petugas','id');
    }
}
