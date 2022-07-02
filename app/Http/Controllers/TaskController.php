<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index() {
        $user = Auth::user();
        $collection = $user->task()->get();

        return view('auth.index_task', compact('collection'));
    }
    public function show($id) {
        $pick_task = Task::find($id);

        return view('auth.show_task', compact('pick_task'));
    }
    public function create() {
        return view('auth.create_task');
    }
    public function store(Request $request) {
        $task = new Task;
        $task->task = $request->task;
        $task->memo = $request->memo;
        $task->user_id = Auth::id();
        $task->save();
        return redirect('/index');
    }
    public function edit($id) {
        $edit_task = Task::find($id);
        return view('auth.edit_task', compact('edit_task'));
    }

    public function update(Request $request, $id) {
        $task = Task::find($id);
        $task->task = $request->task;
        $task->memo = $request->memo;
        $task->task_flg = $request->task_flg;
        $task->user_id = Auth::id();
        $task->save();
        return redirect()->route('show', ['id' => $id]);
    }
    public function delete($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect('/index');
    }
}
