<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        $collection = Task::all();

        return view('auth.index_task', compact('collection'));
    }

}
