<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('index', compact($tasks));
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->back();
    }
}
