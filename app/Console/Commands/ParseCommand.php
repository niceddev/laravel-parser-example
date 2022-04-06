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
    protected $signature = 'parse';

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
    public function handle(JmartParserService $parseService)
    {
//        $bar = $this->output->createProgressBar();
//        $bar->start();

//        $bar->finish();

//        $this->info(' Shop was successfully parsed!');

        var_dump($parseService->parseUrl());

    }
}
