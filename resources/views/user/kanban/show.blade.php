@extends('layouts.app')

@section('content')
    <div class="containe">
        <h1>{{ $group->name }}</h1>
        <h2>Users</h2>
        <ul>
            @foreach ($group->users as $user)
                <li>{{ $user->pseudo }}</li>
            @endforeach
        </ul>

        <h2>Columns</h2>
        <form action="{{ route('columns.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Column name" required>
            <input type="number" name="index" placeholder="Column index" required>
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            <button type="submit">Add Column</button>
        </form>
        <div class="cont-column">
            @foreach ($group->columns as $column)
                <div class="column">
                    <div class="head-column">
                        <h3>{{ $column->name }}</h3>
                        <form action="{{ route('columns.destroy', $column) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                    <ul class="eqregr">
                        @foreach ($column->tasks as $task)
                            <div class="cont-task">
                                <div class="head-task">
                                    <h3>{{ $task->name }}</h3>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                                <div>{{ $task->description }}</div>
                            </div>
                        @endforeach
                    </ul>
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="zregzagr">
                            <input type="text" name="name" placeholder="Task name" required>
                            <textarea name="description" placeholder="Task description"></textarea>
                            <input type="hidden" name="column_id" value="{{ $column->id }}">
                            <button type="submit">Add Task</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection


<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html,
    body {
        height: 100%;
        overflow: hidden;
    }

    .containe {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .cont-column {
        display: flex;
        flex-direction: row;
        color: #131F3C;
        overflow-x: auto;
        white-space: nowrap;
        height: calc(100vh - 200px);
    }

    .column {
        background: #EDEFF1;
        display: flex;
        flex-direction: column;
        margin: 5px;
        border-radius: 12px;
        box-shadow: var(--ds-shadow-raised, 0px 1px 1px #091e4240, 0px 0px 1px #091e424f);
        max-height: calc(100vh - 230px);
        overflow-y: auto;
        flex-grow: 0;
        flex-shrink: 0;
        flex-basis: auto;
        height: fit-content;
        width: 300px;
    }

    .column h3 {
        width: 100%;
        padding: 5px;
        height: auto;
    }

    .head-column {
        display: flex;
        flex-direction: row;
        margin: 10px 10px 0 10px;
    }

    .head-column button {
        width: 50px;
        border-radius: 6px;
        border: 0.5px solid rgba(251, 251, 251, 0.2);
        background-color: rgba(251, 251, 251, 0.1);
        padding: 5px 5px;
        margin: 5px;
    }

    .head-column button:hover {
        background-color: #C6CAD3;
    }

    .eqregr {
        overflow-x: auto;
        white-space: nowrap;
    }

    .cont-task {
        margin: 0 4px 10px 4px;
        padding: 0px 4px;
        min-height: 36px;
        border: 2px solid #ffff;
        border-radius: 8px;
        background-color: var(--ds-surface-raised, #ffffff);
        box-shadow: var(--ds-shadow-raised, 0px 1px 1px #091e4240, 0px 0px 1px #091e424f);
        color: var(--ds-text, #172b4d);
        cursor: pointer;
    }

    .cont-task:hover {
        border: 2px solid blue;
    }

    .head-task {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin: 10px 10px 0 10px;
    }

    .head-task button {
        width: 50px;
        border-radius: 6px;
        border: 0.5px solid rgba(251, 251, 251, 0.2);
        background-color: rgba(251, 251, 251, 0.1);
        padding: 5px 5px;
        margin: 5px;
    }

    .head-task h3 {
        padding: 5px;
        height: auto;
    }

    .head-task button:hover {
        background-color: #C6CAD3;
    }

    .zregzagr {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-top: 10px;
    }
</style>
