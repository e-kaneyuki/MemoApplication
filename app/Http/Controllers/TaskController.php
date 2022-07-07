<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Task一覧表示
     * @param Illuminate\Database\Eloquent\Collection $collection
     * @param Illuminate\Support\Collection $task_flg_base
     * @param array boolean[] $array_task_flg trueは非実施 falseは実施済み
     */
    public function index() {
        $user = Auth::user();
        $collection = $user->task()->get();
        $task_flg_base = $collection->pluck('task_flg');
        $array_task_flg = $task_flg_base->toArray();
        $task_flg_zero = in_array(false,$array_task_flg);
        $task_flg_one = in_array(true,$array_task_flg);

        return view('auth.task.index_task', compact('collection','task_flg_zero','task_flg_one'));
    }
    /**
     * Task詳細表示
     * @param App\Models\Task $id
     * @var array boolean[] $array_task_flg
     */
    public function show($id) {
        $pick_task = Task::find($id);

        return view('auth.task.show_task', compact('pick_task'));
    }
    //Task新規作成画面への遷移
    public function create() {
        return view('auth.task.create_task');
    }
    /**
     * Task新規登録
     * @param Illuminate\Http\Request  $request
     * @param App\Models\Task $task
     *
     */
    public function store(Request $request) {
        $task = new Task;
        $task->task = $request->task;
        $task->memo = $request->memo;
        $task->user_id = Auth::id();
        $task->save();
        return redirect('/task/index')->with('message', 'タスクを作成しました');
    }
    public function edit($id) {
        $edit_task = Task::find($id);
        return view('auth.task.edit_task', compact('edit_task'));
    }
    /**
     * Task情報更新
     *
     * @param Illuminate\Http\Request
     * @param int $id
     *
     */
    public function update(Request $request, $id) {
        $task = Task::find($id);
        $task->task = $request->task;
        $task->memo = $request->memo;
        $task->task_flg = $request->task_flg;
        $task->user_id = Auth::id();
        $task->save();
        return redirect()->route('task.show', ['id' => $id])->with('message', 'タスクを編集しました');
    }
    public function delete($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect('/task/index')->with('delete_message', 'タスクを削除しました');
    }
    /**
     * Task実施状況でのSort
     * @param Illuminate\Database\Eloquent\Collection $collection
     * @param Illuminate\Support\Collection $task_flg_base
     * @param array boolean[] $array_task_flg trueは非実施 falseは実施済み
     *
     */
    public function search($task_fig) {
        $user = Auth::user();
        $collection = $user->task()->where('task_flg',$task_fig)->get();
        $task_flg_base = $collection->pluck('task_flg');
        $array_task_flg = $task_flg_base->toArray();
        $task_flg_zero = in_array(false,$array_task_flg);
        $task_flg_one = in_array(true,$array_task_flg);

        return view('auth.task.index_task', compact('collection','task_flg_zero','task_flg_one'));
    }

}
