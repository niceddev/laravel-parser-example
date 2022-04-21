<?php

namespace App\Console\Commands;

use App\Enums\ServiceEnum;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ParseCommand extends Command
{
    protected $signature = 'parse {service}';
    protected $description = "Parse products";

    public function handle()
    {
        $service = $this->argument('service');
        $enum = ServiceEnum::from($service);
        $parseService = app($enum->services()[$service]);

        $parseService->parseUrl($enum->categories()[$service]);
    }
}
