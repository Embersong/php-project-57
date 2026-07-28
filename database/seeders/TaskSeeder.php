<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'name' => 'Исправить ошибку в какой-нибудь строке',
                'description' => 'Я тут ошибку нашёл, надо бы её исправить и так далее и так далее',
            ],
            [
                'name' => 'Допилить дизайн главной страницы',
                'description' => 'Вёрстка поехала в далёкие края. Нужно удалить бутстрап!',
            ],
            [
                'name' => 'Отрефакторить авторизацию',
                'description' => 'Выпилить всё легаси, которое найдёшь',
            ],
            [
                'name' => 'Доработать команду подготовки БД',
                'description' => 'За одно добавить тестовых данных',
            ],
            [
                'name' => 'Пофиксить вон ту кнопку',
                'description' => 'Кажется она не того цвета',
            ],
        ];
        foreach ($tasks as $task) {
            Task::firstOrCreate([
                'name' => $task['name'],
                'description' => $task['description'],
                'status_id' => TaskStatus::inRandomOrder()->first()->id,
                'created_by_id' => User::inRandomOrder()->first()->id,
                'assigned_to_id' => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
