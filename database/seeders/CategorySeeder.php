<?php

namespace Database\Seeders;

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
        \DB::table('categories')->insert([
            [
                'name' => 'Ноутбуки и компьюетры',
                'parent_id' => null,
                'alias' => 'laptops_computers',
            ],
            [
                'name' => 'Смартфоны и гаджеты',
                'parent_id' => null,
                'alias' => 'phones_gadgets',
            ],

            [
                'name' => 'Ноутбуки',
                'parent_id' => 1,
                'alias' => 'laptops',
            ],
            [
                'name' => 'Настольные компьютеры',
                'parent_id' => 1,
                'alias' => 'computers',
            ],
            [
                'name' => 'Комплектующие',
                'parent_id' => 1,
                'alias' => 'laptop_pc_accessories',
            ],
            [
                'name' => 'Смартфоны/телефоны',
                'parent_id' => 2,
                'alias' => 'smartphones',
            ],
            [
                'name' => 'Гаджеты',
                'parent_id' => 2,
                'alias' => 'gadgets',
            ],
            [
                'name' => 'Аксессуары для телефонов',
                'parent_id' => 2,
                'alias' => 'phone_accessories',
            ]
        ]);
    }
}
