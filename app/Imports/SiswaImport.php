<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\SiswaModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new SiswaModel([
           'nis'        => $row['nis'],
           'nama'       => $row['nama'], 
           'kelas'      => $row['kelas'],
           'alamat'     => $row['alamat'],
           'umur'       => $row['umur']
        ]);
    }
}
