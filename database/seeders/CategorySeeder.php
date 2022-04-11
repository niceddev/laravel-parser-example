<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::updateOrCreate([
            'name' => 'Ноутбуки и компьюетры',
            'parent_id' => null,
            'alias' => 'laptops_computers',
        ]);
        $category->insert([
            [
                'name' => 'Ноутбуки',
                'parent_id' => 1,
                'alias' => 'laptops',
            ],
            [
                'name' => 'Настольные компьютеры',
                'parent_id' => 2,
                'alias' => 'computers',
            ],
            [
                'name' => 'Комплектующие',
                'parent_id' => 3,
                'alias' => 'laptop_pc_accessories',
            ]
        ]);

        $category->updateOrCreate([
            'name' => 'Смартфоны и гаджеты',
            'parent_id' => null,
            'alias' => 'phones_gadgets',
        ]);
        $category->insert([
            [
                'name' => 'Смартфоны/телефоны',
                'parent_id' => 4,
                'alias' => 'smartphones',
            ],
            [
                'name' => 'Гаджеты',
                'parent_id' => 5,
                'alias' => 'gadgets',
            ],
            [
                'name' => 'Аксессуары для телефонов',
                'parent_id' => 6,
                'alias' => 'phone_accessories',
            ]
        ]);
    }
}
