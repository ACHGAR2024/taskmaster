@extends('layouts.app')

@section('content')
    <h1>Groups</h1>
    <a href="{{ route('groups.create') }}">Create New Group</a>
    <ul>
        @foreach ($groups as $group)
            <li>
                <a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a>
                <form action="{{ route('groups.destroy', $group) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
