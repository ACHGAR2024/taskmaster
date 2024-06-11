@extends('layouts.app')

@section('content')


    <!-- Table de compte utilisateurs -->

    <div class="container mx-auto px-4 py-8 bg-grisp">
        <h1 class="text-3xl font-bold mb-4 text-blancp bg-blue-900 p-4 rounded">Liste des utilisateurs</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="overflow-x-auto">
            @if ($currentUser->role_id == 2)
                <table class="table-auto w-3/4">
                    <thead>
                        <tr class="bg-vertp text-blancp text-sm">
                            <th class="px-4 py-2">Id</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Pseudo</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Date de création</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="{{ $loop->even ? 'bg-grisp text-blancp' : 'bg-blancp text-noirp' }}">
                                <td class="border px-4 py-2 text-sm">{{ $user->id }}</td>
                                <td class="border px-4 py-2 text-sm"><img src="storage/{{ $user->image }}"
                                        alt="{{ $user->name }}" class="w-12 h-12 object-cover rounded-lg"></td>
                                <td class="border px-4 py-2 text-sm">{{ $user->pseudo }}</td>
                                <td class="border px-4 py-2 text-sm">{{ $user->email }}</td>
                                <td class="border px-4 py-2 text-sm">{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="border px-4 py-2 text-sm">
                                    @if ($user->role_id == 1)
                                        Inviter
                                    @elseif($user->role_id == 2)
                                        Admin
                                    @endif
                                </td>

                                <td class="border px-4 py-2">

                                    <form action="{{ route('user.toggleRole', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="bg-vertp text-sm mb-2 text-blancp hover:bg-rougep text-white font-bold py-1 px-2 rounded">Modifier
                                            Statut</button>
                                    </form>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-rougep text-sm mb-2 text-blancp hover:bg-vertp text-white font-bold py-1 px-2 rounded">Supprimer</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
