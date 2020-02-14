<?php

return [
    /**
     * Schema Path
     *
     * The folder to publish your packages schema to
     */
    'schema_path' => env('SCHEMA_PATH', base_path('grahpql')),

    /**
     * Frontend Assets
     *
     * The path to the assets frontend components are stored
     */
    'frontend_assets' => env('APPNAME_FRONTEND_ASSETS', resource_path('js'))
];
