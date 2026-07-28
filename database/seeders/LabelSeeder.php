<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labels = [
            [
                'name' => 'ошибка',
                'description' => 'Какая-то ошибка в коде или проблема с функциональностью'
            ],
            [
                'name' => 'документация',
                'description' => 'Задача которая касается документации'
            ],
            [
                'name' => 'дубликат',
                'description' => 'Повтор другой задачи'
            ],
            [
                'name' => 'доработка',
                'description' => 'Новая фича, которую нужно запилить'
            ],
        ];
        foreach ($labels as $label) {
            Label::firstOrCreate([
                'name' => $label['name'],
                'description' => $label['description'],
            ]);
        }
    }
}
