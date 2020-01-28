<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = ['id_siswa', 'id_jenis', 'dibayar' , 'kelas_siswa' ,'tgl_pembayaran','sisa_pembayaran','status'];
    public $timestamps = false;

    public function jenis() : BelongsTo
    {
        return $this->belongsTo('App\Models\JenisModel', 'id_jenis');
    }
    public function siswa(): BelongsTo
    {
        return $this->belongsTo('App\Models\SiswaModel', 'id_siswa');
    }

    public function scopeOrderAndFilter($query, $args) {
        return $query->orderBy('status',"Belum Lunas");
    }

}
