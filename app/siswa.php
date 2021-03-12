<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nisn','nama','id_kelas','alamat','no_telp','id_spp'];
    
    public function kelas()
    {
        return $this->belongsTo(kelas::class,'id_kelas','id');
    }
    public function spp()
    {
        return $this->belongsTo(spp::class,'id_spp','id');
    }
    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class,'id_spp','id_spp');
    }
}
