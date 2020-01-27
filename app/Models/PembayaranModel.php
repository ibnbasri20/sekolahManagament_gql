<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = ['id_siswa', 'id_jenis', 'dibayar' ,'tgl_pembayaran'];
    public $timestamps = false;

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(JenisModel::class);
    }

}
