<?php

namespace App\Enums;

enum JmartCategory: string
{
    case LAPTOPS = 'https://jmart.kz/gw/catalog/v1/products?category_id=597';
    case COMPUTERS = 'https://jmart.kz/gw/catalog/v1/products?category_id=462';
    case LAPTOP_PC_ACCESSORIES = 'https://jmart.kz/gw/catalog/v1/products?category_id=11811';
}
