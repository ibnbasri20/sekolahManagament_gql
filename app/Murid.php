<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;

class Murid
{
    public function cari($root, array $args, $context, ResolveInfo $resolveInfo): Builder
    {
        return DB::table('siswa')
            ->where('nama', 'LIKE', '%'.$args['nama'].'%')
            ->orderBy('kelas', 'asc')
            ->orderBy('nama', 'asc');
    }
    public function cariMurid($root, array $args, $context, ResolveInfo $resolveInfo): Builder
    {
        return DB::table('siswa')->where('id', $args['id_siswa']);
    }

    public function tunggakanSiswa($root, array $args, $context, ResolveInfo $resolveInfo): Builder
    {
        if(!DB::table('siswa')->where('id' , $args['id_siswa'])->first()) throw new \GraphQL\Error\Error('Data Siswa Tidak ditemukan');
            if(!DB::table('pembayaran')->where('id_siswa' , $args['id_siswa'])->first()) throw new \GraphQL\Error\Error('Data Siswa Tidak ditemukan');
                return DB::table('pembayaran AS t')
                    ->select('t.id' , 't.status as status_pembayaran', 't.id_jenis', 't.kelas_siswa', 't.sisa_pembayaran'   ,  'siswa.*'  ,'jenis_pembayaran.*')
                    ->join('siswa', 't.id_siswa', '=', 'siswa.id' )
                    ->join('jenis_pembayaran', 't.id_jenis', '=', 'jenis_pembayaran.id' )
                    ->where([
                        ['t.id_siswa', '=', $args['id_siswa']],
                        ['t.status' ,'=', "Belum Lunas"]
                    ]);
    }
}