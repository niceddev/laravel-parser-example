<?php

namespace App\Enums;

enum TechnodomCategory: string
{
    case LAPTOPS = 'https://api.technodom.kz/katalog/api/v1/products/category/noutbuki?city_id=5f5f1e3b4c8a49e692fefd70&limit=24';
    case COMPUTERS = 'https://api.technodom.kz/katalog/api/v1/products/category/stacionarnye-pk?city_id=5f5f1e3b4c8a49e692fefd70&limit=24';
    case LAPTOP_PC_ACCESSORIES = 'https://api.technodom.kz/katalog/api/v1/products/category/komp-juternye-aksessuary?city_id=5f5f1e3b4c8a49e692fefd70&limit=24';
}
