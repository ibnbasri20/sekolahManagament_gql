<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\DB;
class DeleteSiswa
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
        $siswa = DB::table('siswa')->where('id', $args['id']);
        if(!$siswa->first()) throw new \GraphQL\Error\Error('Data Tidak ditemukan');
        $id_user = $siswa->first(); 
        DB::table('users')->where('id', $id_user->id_user)->delete();
        $siswa->delete();
        return [
            'status' => 'SUCCESS',
        ];
    }
}
