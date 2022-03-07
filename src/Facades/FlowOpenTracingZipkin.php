<?php

namespace EricPridham\FlowOpenTracingZipkin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \EricPridham\FlowOpenTracingZipkin\FlowOpenTracingZipkin
 */
class FlowOpenTracingZipkin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flow-opentracing-zipkin';
    }
}
