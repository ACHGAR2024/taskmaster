<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('users', 'columns.tasks')->get();
        return view('user.kanban.index', compact('groups'));
    }

    public function create()
    {
        $users = User::all();
        return view('user.kanban.create', compact('users'));
    }

    public function store(Request $request)
    {
        $group = Group::create($request->all());
        $group->users()->attach($request->input('user_ids'));
        return redirect()->route('groups.index');
    }

    public function show(Group $group)
    {
        return view('user.kanban.show', compact('group'));
    }

    public function edit(Group $group)
    {
        $users = User::all();
        return view('user.kanban.edit', compact('group', 'users'));
    }

    public function update(Request $request, Group $group)
    {
        $group->update($request->all());
        $group->users()->sync($request->input('user_ids'));
        return redirect()->route('groups.index');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index');
    }
}