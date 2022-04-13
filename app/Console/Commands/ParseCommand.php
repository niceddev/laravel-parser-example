<?php

namespace App\Console\Commands;

use App\Enums\JmartCategory;
use App\Enums\MechtaCategory;
use App\Enums\TechnodomCategory;
use App\Services\JmartParserService;
use App\Services\TechnodomParserService;
use App\Services\MechtaParserService;
use Illuminate\Console\Command;
use Illuminate\Container\Container;

class ParseCommand extends Command
{
    protected $signature = 'parse {service}';
    protected $description = "Parse products";

    private Container $container;
    private $services;
    private $categories;

    public function __construct(Container $container)
    {
        parent::__construct();
        $this->container = $container;
        $this->services = [
            'jmart'     => JmartParserService::class,
            'technodom' => TechnodomParserService::class,
            'mechta'    => MechtaParserService::class
        ];
        $this->categories = [
            'jmart'     => JmartCategory::cases(),
            'technodom' => TechnodomCategory::cases(),
            'mechta'    => MechtaCategory::cases()
        ];
    }

    public function handle()
    {
        $argument = $this->argument('service');

        if (isset($this->services[$argument])) {
            $this->container
                ->make($this->services[$argument])
                ->parseUrl($this->categories[$argument]);
        } else {
            echo 'this service has no parser yet';
        }
    }
}
