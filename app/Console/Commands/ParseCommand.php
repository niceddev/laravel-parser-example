<?php

namespace App\Console\Commands;

use App\Services\JmartParserService;
use App\Services\TechnodomParserService;
use App\Services\ShopKZParserService;
use Illuminate\Console\Command;
use Illuminate\Container\Container;

class ParseCommand extends Command
{
    protected $signature = 'parse {service}';
    protected $description = "Parse products";

    private Container $container;
    private $services;

    public function __construct(Container $container)
    {
        parent::__construct();
        $this->container = $container;
        $this->services = [
            'jmart' => JmartParserService::class,
            'technodom' => TechnodomParserService::class,
            'shopkz' => ShopKZParserService::class
        ];
    }

    public function handle()
    {
        if (isset($this->services[$this->argument('service')])) {
            $this->container
                ->make($this->services[$this->argument('service')])
                ->parseUrl();
        }else{
            echo 'this service has no parser yet';
        }

    }
}
