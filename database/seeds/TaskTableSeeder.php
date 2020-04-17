<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\User;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name', 'admin')->first();


        $task = new Task(['content' => 'Hit the gym']);
        $user->tasks()->save($task);
    
        $task = new Task(['content' => 'Make some food']);
        $user->tasks()->save($task);

        $task = new Task(['content' => 'Finish quiz']);
        $user->tasks()->save($task);
    }
}
