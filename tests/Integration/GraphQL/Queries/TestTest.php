<?php namespace ImBrett\AppName\Tests\Unit;

use ImBrett\AppName\Tests\TestCase;

/**
 * Class TestTest
 *
 * @author ImBrett
 * @package ImBrett\AppName\Tests\Unit
 */
class TestTest extends TestCase
{
    /** @test */
    public function itRunsTestsAgainstSchema()
    {
        $response = $this->postGraphQL([
            'query' => 'query {
                test{
                    status
                    message
                }
            }',
        ]);

        $body = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('test', $body['data']);
        $this->assertArrayHasKey('status', $body['data']['test']);
        $this->assertArrayHasKey('message', $body['data']['test']);
        $this->assertEquals('SUCCESS', $body['data']['test']['status']);
        $this->assertEquals(__('appName.test_message'), $body['data']['test']['message']);
    }
}
