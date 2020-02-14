<?php namespace ImBrett\AppName\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

/**
 * A simple sanity check to ensure our schema is registered
 *
 * @author ImBrett
 * @package ImBrett\AppName\GraphQL\Queries
 */
class Test
{
    /**
     * Resolve the mutation
     *
     * @param $rootValue
     * @param array $args
     * @param GraphQLContext $context
     * @param ResolveInfo $resolveInfo
     * @throws \Exception
     * @return array
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        return [
            'status' => 'SUCCESS',
            'message' => __('appName.test_message'),
        ];
    }
}
