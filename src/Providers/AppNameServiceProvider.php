<?php namespace ImBrett\AppName\Providers;

use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Events\BuildSchemaString;

/**
 * The applications service provider
 *
 * @author ImBrett
 * @package ImBrett\AppName\Providers
 */
class AppNameServiceProvider extends ServiceProvider
{
    /**
     * Register the applications publishable files
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();

        app('events')->listen(
            BuildSchemaString::class,
            function (): string {
                return file_get_contents(__DIR__.'/../../graphql/appName.graphql');
            }
        );
    }

  /**
   * Register the applications configuration files
   *
   * @return void
   */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/config.php',
            'appName'
        );

        $this->publishes([
        __DIR__.'/../../config/config.php' => config_path('app.php'),
        ], 'config');

        $this->publishes([
        __DIR__.'/../../graphql/appName.graphql' => config('app.schema_path'),
        ], 'schema');

        $this->publishes([
            __DIR__.'/../../resources/lang' => base_path('resources/lang'),
        ], 'translations');

        // Enable if your package uses migrations
        // $this->publishes([
        //     __DIR__.'/../../database/migrations' => base_path('database/migrations'),
        // ], 'migrations');

        // Enable if your package uses frontend components
        // $this->publishes([
        //     __DIR__.'path/to/frontend/components' => config('appName.frontend_assets'),
        // ], 'components');
    }
}
