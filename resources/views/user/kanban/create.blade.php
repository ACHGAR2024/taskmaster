@extends('layouts.app')

@section('content')
    <h1>Create New Group</h1>
    <form action="{{ route('groups.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Group name">
        <h2>Users</h2>
        @foreach ($users as $user)
            <label>
                <input type="checkbox" name="user_ids[]" value="{{ $user->id }}">
                {{ $user->pseudo }}
            </label>
        @endforeach
        <button type="submit">Create Group</button>
    </form>
@endsection
