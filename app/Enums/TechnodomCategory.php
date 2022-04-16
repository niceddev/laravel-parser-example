<?php

namespace App\Enums;

enum TechnodomCategory: string
{
    case LAPTOPS = 'https://api.technodom.kz/katalog/api/v1/products/category/noutbuki?city_id=5f5f1e3b4c8a49e692fefd70&limit=24&sorting=score&price=0';
    case COMPUTERS = 'https://api.technodom.kz/katalog/api/v1/products/category/komp-jutery-i-monitory?city_id=5f5f1e3b4c8a49e692fefd70&limit=24&sorting=score&price=0';
    case LAPTOP_PC_ACCESSORIES = 'https://api.technodom.kz/katalog/api/v1/products/category/komp-juternye-aksessuary?city_id=5f5f1e3b4c8a49e692fefd70&limit=24&sorting=score&price=0';
    case SMARTPHONES = 'https://api.technodom.kz/katalog/api/v1/products/category/smartfony-i-telefony?city_id=5f5f1e3b4c8a49e692fefd70&limit=24&sorting=score&price=0';
    case GADGETS = 'https://api.technodom.kz/katalog/api/v1/products/category/gadzhety?city_id=5f5f1e3b4c8a49e692fefd70&limit=24&sorting=score&price=0';
    case PHONE_ACCESSORIES = 'https://api.technodom.kz/katalog/api/v1/products/category/aksessuary-dlja-telefonov?city_id=5f5f1e3b4c8a49e692fefd70&limit=24&sorting=score&price=0';
}
