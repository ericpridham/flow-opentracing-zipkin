<?php

namespace EricPridham\FlowOpenTracingZipkin\Commands;

use Illuminate\Console\Command;

class FlowOpenTracingZipkinCommand extends Command
{
    public $signature = 'flow-opentracing-zipkin';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
