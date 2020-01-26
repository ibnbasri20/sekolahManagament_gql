<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \Firebase\JWT\JWT;
class Auth
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
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $key = "example_key";
        $cek  = DB::table('users')->where('username', $args['username'])->first();
        if(!$cek) throw new \GraphQL\Error\UserError('Data Tidak ditemukan');
            if(!Hash::check($args['password'], $cek->password)) throw new \GraphQL\Error\UserError('Password Salah');
            $payload = array(
                "iss" => "http://example.org",
                "aud" => "http://example.com",
                "iat" => time(),
                "nbf" => time(),
                "login" => time(),
                "user_id" => $cek->id
            );
            return JWT::encode($payload, $key);
    }
}
