<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Column;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request, Column $column)
    {
        $task = $column->tasks()->create($request->all());
        return redirect()->route('groups.show', $column->group);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('groups.show', $task->column->group);
    }

    public function destroy(Task $task)
    {
        $group = $task->column->group;
        $task->delete();
        return redirect()->route('groups.show', $group);
    }
}
