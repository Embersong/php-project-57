<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $task_statuses = [
            'новая',
            'завершена',
            'выполняется',
            'в архиве',
        ];
        foreach ($task_statuses as $status) {
            TaskStatus::firstOrCreate(['name' => $status]);
        }
    }
}
