<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Classes</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<h1>Liste des Classes</h1>

<!-- Affichage des messages de succes ou d'erreur -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Bouton pour ajouter une nouveau prof -->
<button><a href="{{ route('professeurs.create') }}" class="btn btn-primary">Ajouter une Classe</a></button>
<br>
<br>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Specialite</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($professeurs as $professeur)
        <tr>
            <td>{{ $professeur->id }}</td>
            <td>{{ $professeur->nom }}</td>
            <td>{{ $professeur->prenom }}</td>
            <td>{{ $professeur->email }}</td>
            <td>{{ $professeur->telephone }}</td>
            <td>{{ $professeur->specialite }}</td>
            <td>
                <a href="{{ route('professeurs.edit', $professeur->id) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('professeurs.destroy', $professeur->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir supprimer ce prof ?')">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>

</html>
