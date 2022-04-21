<?php

namespace App\Enums;

use App\Services\JmartParserService;
use App\Services\MechtaParserService;
use App\Services\TechnodomParserService;

enum ServiceEnum: int
{
    case JMART = 1;
    case TECHNODOM = 2;
    case MECHTA = 3;

    public function services()
    {
        return [
            self::JMART->value      => JmartParserService::class,
            self::TECHNODOM->value  => TechnodomParserService::class,
            self::MECHTA->value     => MechtaParserService::class,
        ];
    }

    public function categories()
    {
        return [
            self::JMART->value     => JmartCategory::cases(),
            self::TECHNODOM->value => TechnodomCategory::cases(),
            self::MECHTA->value    => MechtaCategory::cases(),
        ];
    }
}
