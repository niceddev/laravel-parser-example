<?php

namespace App\Enums;

enum MechtaCategory: string
{
    case LAPTOPS = 'https://www.mechta.kz/api/new/catalog?section=noutbuki';
    case COMPUTERS = 'https://www.mechta.kz/api/new/catalog?section=personalnye-kompyutery';
    case LAPTOP_PC_ACCESSORIES = 'https://www.mechta.kz/api/new/catalog?section=kompyuternye-aksessuary';
    case SMARTPHONES = 'https://www.mechta.kz/api/new/catalog?section=smartfony';
    case GADGETS = 'https://www.mechta.kz/api/new/catalog?section=gadjety';
    case PHONE_ACCESSORIES = 'https://www.mechta.kz/api/new/catalog?section=aksessuary-k-mobilnym-telefonam';
}
