@extends('layouts.app')

@section('content')
    <h1>{{ $group->name }}</h1>
    <h2>Users</h2>
    <ul>
        @foreach ($group->users as $user)
            <li>{{ $user->pseudo }}</li>
        @endforeach
    </ul>

    <h2>Columns</h2>
    <form action="{{ route('columns.store', $group) }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Column name" required>
        <input type="number" name="index" placeholder="Column index" required>
        <button type="submit">Add Column</button>
    </form>
    <ul>
        @foreach ($group->columns as $column)
            <li>
                <h3>{{ $column->name }}</h3>
                <form action="{{ route('columns.destroy', $column) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Column</button>
                </form>
                <h4>Tasks</h4>
                <form action="{{ route('tasks.store', $column) }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Task name" required>
                    <textarea name="description" placeholder="Task description"></textarea>
                    <button type="submit">Add Task</button>
                </form>
                <ul>
                    @foreach ($column->tasks as $task)
                        <li>
                            {{ $task->name }}
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete Task</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
