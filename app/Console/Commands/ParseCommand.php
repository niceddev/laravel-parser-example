<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\JmartParserService;
use App\Services\TechnodomParserService;
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
        $this->container = $container;
        $this->services = [
            'jmart' => JmartParserService::class,
            'technodom' => TechnodomParserService::class,
//            '' => ::class,
        ];
        parent::__construct();
    }

    public function handle()
    {
        if (isset($this->services[$this->argument('service')])) {
            $service = $this->container->make($this->services[$this->argument('service') ?? 'jmart']);
            $dataset = $service->parseUrl();

            dd($dataset);

//            foreach ($dataset as $data){
//                echo gettype($data);
//                $service->addProduct($data);
//            }
        }else{
            echo 'this service has no parser yet';
        }

    }
}
