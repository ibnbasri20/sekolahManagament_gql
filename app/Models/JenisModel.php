<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JenisModel extends Model
{
    protected $table = 'jenis_pembayaran';
    protected $fillable = [ 'nama_pembayaran','harga','beban_kelas'];
    public $timestamps = false;

    public function pembayaran(): HasMany
    {
        return $this->hasMany(PembayaranModel::class);
    }

}
