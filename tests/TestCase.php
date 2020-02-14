<?php namespace ImBrett\AppName\Tests;

use ImBrett\AppName\Providers\AppNameServiceProvider;
use Nuwave\Lighthouse\LighthouseServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Foundation\Testing\TestResponse;

/**
 * Class TestCase
 *
 * @author ImBrett
 * @package ImBrett\AppName\Tests
 */
class TestCase extends Orchestra
{
    /**
     * The application service providers to register
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
            LighthouseServiceProvider::class,
            AppNameServiceProvider::class,
        ];
    }

    /**
     * Define environment setup
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Set dummy app key
        $app['config']->set('app.key', 'AckfSECXIvnK5r28GVIWUAxmbBSjTsmF');

        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'appName_testing');
        $app['config']->set('database.connections.appName_testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        // Register default lighthouse schema
        $app['config']->set('lighthouse.schema.register', __DIR__.'/schema.graphql');
    }

    /**
     * Dummy test to ensure tests run
     *
     * @return void
     */
    public function test_assert_true()
    {
        $this->assertTrue(true);
    }

    /**
     * Create a user for testing
     *
     * @return void
     */
    public function createUser()
    {
        return User::create([
            'name'     => 'ImBrett',
            'email'    => 'ImBrett@test.com',
            'password' => bcrypt('password'),
        ]);
    }

    /**
     * Execute a query as if it was sent as a request to the server.
     *
     * @param mixed[] $data
     * @param mixed[] $headers
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function postGraphQL(array $data, array $headers = []): TestResponse
    {
        return $this->postJson('graphql', $data, $headers);
    }
}
