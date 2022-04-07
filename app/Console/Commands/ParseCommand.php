<?php

namespace App\Console\Commands;

use App\Services\JmartParserService;
use Illuminate\Console\Command;

class ParseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse {service?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Parse products";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $service = new JmartParserService();
        $data = $service->parseUrl();
        $service->addProduct($data);

    }
}
