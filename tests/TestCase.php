<?php

namespace EricPridham\FlowOpenTracingZipkin\Tests;

use EricPridham\FlowOpenTracingZipkin\FlowOpenTracingZipkinServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'EricPridham\\FlowOpenTracingZipkin\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FlowOpenTracingZipkinServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_flow-opentracing-zipkin_table.php.stub';
        $migration->up();
        */
    }
}
