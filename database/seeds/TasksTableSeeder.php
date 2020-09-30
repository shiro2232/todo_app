<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [[
            'task_name' => 'プログラミング',
            'user_id' => 1,
            'category_id' => 1,
            'complete_flg' => false,
            'delete_flg' => false
        ],[
            'task_name' => '筋トレ',
            'user_id' => 1,
            'category_id' => 1,
            'complete_flg' => false,
            'delete_flg' => false
        ],[
            'task_name' => '梨泰院クラスをみる',
            'user_id' => 1,
            'category_id' => 1,
            'complete_flg' => false,
            'delete_flg' => false
        ],
        [
            'task_name' => 'スマブラ',
            'user_id' => 2,
            'category_id' => 1,
            'complete_flg' => false,
            'delete_flg' => false
        ]];
        //
        foreach($tasks as $task) {
            DB::table('tasks')->insert($task);
        }
    }
}
