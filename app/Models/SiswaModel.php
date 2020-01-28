<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['id','nis', 'nama','alamat','kelas','umur','id_user'];
    public $timestamps = false;
    public function pembayaran()
    {
        return $this->hasMany('App\Models\PembayaranModel');
    }

}
