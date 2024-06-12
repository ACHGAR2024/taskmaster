<!-- resources/views/tasks/create.blade.php -->
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nom de la tâche :</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="description">Description :</label>
        <textarea name="description" id="description" rows="3"></textarea>
    </div>
    <button type="submit">Créer la tâche</button>
</form>
