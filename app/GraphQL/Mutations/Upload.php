<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Http\Request;

class Upload
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
        $file = $args['file'];
        $nama = array();
        foreach($file as $files) {
            $destinationPath = 'storage/photo';
            $filename = $files->getClientOriginalName();
            $upload_success = $files->move($destinationPath, $filename);
            $nama[] = date('Y-m-d-H:i:s')."-".$files->getClientOriginalName();
//            $data = $files->storePublicly('uploads');
//            $nama[] = date('Y-m-d-H:i:s')."-".$data;
        }
        return $args['file_name'] = implode(",", $nama);
    }
}
