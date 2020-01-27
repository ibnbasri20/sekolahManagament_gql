<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\DB;
use App\Models\PembayaranModel;
class Pembayaran
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        if(!DB::table('siswa')->where('id', $args['id_siswa'])->first()) throw new \GraphQL\Error\Error('Data Siswa Tidak ditemukan');
            if(!DB::table('jenis_pembayaran')->where('id', $args['id_jenis'])->first()) throw new \GraphQL\Error\Error('Data Jenis Pembayaran Tidak ditemukan');
                if(DB::table('pembayaran')->where('id_siswa', $args['id_siswa'])->where('id_jenis', $args['id_jenis'])->first()) throw new \GraphQL\Error\Error('Sudah Terbayar Dibayar');            
            PembayaranModel::create($args);
        return [
            'status'    => "Berhasil Membayar"
        ];
    }
}
