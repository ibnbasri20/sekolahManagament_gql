<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['kelas'];
    public $timestamps = false;
}
