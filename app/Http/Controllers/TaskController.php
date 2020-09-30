<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //タスクリスト表示
    public function taskListShow(){
        //ログイン中でないならログイン画面へ遷移
        if(Auth::user()){
            //ログイン中ユーザーで未完了のタスクのみ取得
            $tasks = Task::where('user_id', Auth::user()->id)
                ->where('complete_flg', false)
                ->where('delete_flg', false)->get();
            return view('task.list', ['tasks' => $tasks]);
        } else {
           return redirect('login')->with('flash_message','ログインしてください');
        }

    }

    //タスク追加画面表示
    public function addTaskShow(){
        //ログイン中でないならログイン画面へ遷移
        if(Auth::user()){
            return view('task.add');
        } else {
            return redirect('login')->with('flash_message','ログインしてください');
        }
    }

    //タスクを追加
    public function addTask (Request $request) {
        $this->taskValidator($request->all())->validate();
        $task = new Task;
        $task->fill($request->all());
        $task->user_id = Auth::user()->id;
        $task->delete_flg = false;
        $task->save();
        return redirect('/task/list')->with('flash_message','タスクを追加しました');
    }

    //タスクバリデーション処理
    public function taskValidator(array $data){
        return Validator::make($data, [
            'task_name' => ['required', 'string', 'max:50'],
        ]);
    }
}
