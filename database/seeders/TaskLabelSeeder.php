<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labelsCount = Label::count();
        Task::all()->each(function ($task) use ($labelsCount) {
            $labels = Label::inRandomOrder()
                ->limit(rand(1, $labelsCount))
                ->get();

            $task->labels()->attach($labels);
        });
    }
}
