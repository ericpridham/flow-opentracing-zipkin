<?php

namespace EricPridham\FlowOpenTracingZipkin;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use EricPridham\FlowOpenTracingZipkin\Commands\FlowOpenTracingZipkinCommand;

class FlowOpenTracingZipkinServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('flow-opentracing-zipkin')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_flow-opentracing-zipkin_table')
            ->hasCommand(FlowOpenTracingZipkinCommand::class);
    }
}
