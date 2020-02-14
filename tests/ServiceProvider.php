<?php namespace ImBrett\AppName\Tests;

/**
 * Class Service Provider
 *
 * @author ImBrett
 * @package ImBrett\AppName\Tests
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * The booting method of the service provider
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(realpath(__DIR__.'/../tests/migrations'));
    }
}
