<form action="{{ route('professeurs.store') }}" method="POST">
    @csrf
    <label for="nom">Nom de la classe</label>
    <input type="text" name="nom" id="nom" required>

    <label for="prenom">Prenom</label>
    <input type="text" name="prenom" id="prenom" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="telephone">Telephone</label>
    <input type="text" name="telephone" id="telephone" required>

    <label for="specialite">Specialite</label>
    <input type="text" name="specialite" id="specialite" required>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
