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
}