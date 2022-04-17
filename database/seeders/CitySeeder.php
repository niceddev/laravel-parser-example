<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cities')->insert([
            [
                'name' => 'Нур-Султан (Астана)'
            ],
            [
                'name' => 'Алматы'
            ],
            [
                'name' => 'Актау'
            ],
            [
                'name' => 'Караганда'
            ],
            [
                'name' => 'Кокшетау'
            ],
            [
                'name' => 'Костанай'
            ],
            [
                'name' => 'Павлодар'
            ],
            [
                'name' => 'Петропавловск'
            ],
            [
                'name' => 'Семей'
            ],
            [
                'name' => 'Уральск'
            ],
            [
                'name' => 'Усть-Каменогорск'
            ],
            [
                'name' => 'Шымкент'
            ],
            [
                'name' => 'Актобе'
            ],
            [
                'name' => 'Атырау'
            ],
            [
                'name' => 'Кызылорда'
            ],
            [
                'name' => 'Туркестан'
            ],
            [
                'name' => 'Экибастуз'
            ],
            [
                'name' => 'Жанаозен'
            ],
            [
                'name' => 'Рудный'
            ],
            [
                'name' => 'Тараз'
            ],
            [
                'name' => 'Есик'
            ],
            [
                'name' => 'Жетысай'
            ],
            [
                'name' => 'Кандыагаш'
            ],
            [
                'name' => 'Сатпаев'
            ],
            [
                'name' => 'Жезказган'
            ],
            [
                'name' => 'Айтеке-Би'
            ],
            [
                'name' => 'Сарыагаш'
            ],
            [
                'name' => 'Бейнеу'
            ],
            [
                'name' => 'Абай'
            ],
            [
                'name' => 'Хромтау'
            ],
            [
                'name' => 'Шиели'
            ],
            [
                'name' => 'Аркалык'
            ],
            [
                'name' => 'Узынагаш'
            ],
            [
                'name' => 'Кентау'
            ],
            [
                'name' => 'Темиртау'
            ],
            [
                'name' => 'Шахтинск'
            ],
            [
                'name' => 'Атбасар'
            ],
            [
                'name' => 'Жаркент'
            ],
            [
                'name' => 'Талдыкорган'
            ],
            [
                'name' => 'Каскелен'
            ],
            [
                'name' => 'Аягоз'
            ],
            [
                'name' => 'Жанаарка'
            ],
            [
                'name' => 'Аксай'
            ],
        ]);
    }
}

