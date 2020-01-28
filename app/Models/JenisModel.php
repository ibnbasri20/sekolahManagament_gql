<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisModel extends Model
{
    protected $table = 'jenis_pembayaran';
    protected $fillable = [ 'nama_pembayaran','harga','beban_kelas'];
    public $timestamps = false;

    public function pembayaran()
    {
        return $this->hasMany('App\Models\PembayaranModel');
    }

}
