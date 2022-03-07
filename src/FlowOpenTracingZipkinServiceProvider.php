<?php

namespace EricPridham\FlowOpenTracingZipkin;

use OpenTracing\Tracer as OTTracer;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Zipkin\Endpoint;
use Zipkin\Reporters\Http;
use Zipkin\Samplers\BinarySampler;
use Zipkin\TracingBuilder;
use ZipkinOpenTracing\Tracer as ZipkinTracer;

class FlowOpenTracingZipkinServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('flow-opentracing-zipkin')
            ->hasConfigFile();
    }

    public function registeringPackage()
    {
        $this->app->singleton(OTTracer::class, function ($app) {
            $endpoint = Endpoint::create(config('flow-opentracing-zipkin.serviceName'));
            $reporter = new Http([
                'endpoint_url' => config('flow-opentracing-zipkin.scheme') . '://' . config('flow-opentracing-zipkin.host') . ':' . config('flow-opentracing-zipkin.port') . '/api/v2/spans'
            ]);

            $sampler = BinarySampler::createAsAlwaysSample();
            $tracing = TracingBuilder::create()
                ->havingLocalEndpoint($endpoint)
                ->havingSampler($sampler)
                ->havingReporter($reporter)
                ->build();

            return new ZipkinTracer($tracing);
        });
    }

}
