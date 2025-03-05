<form action="{{ route('professeurs.update', $professeur->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nom">Nom </label>
    <input type="text" name="nom" id="nom" value="{{ $professeur->nom }}" required>
<br>
    <label for="prenom">Prenom</label>
    <input type="text" name="prenom" id="prenom" value="{{ $professeur->prenom }}" required>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ $professeur->email }}" required>
    <br>
    <label for="telephone">Telephone</label>
    <input type="text" name="telephone" id="telephone" value="{{ $professeur->telephone }}" required>
    <br>
    <label for="specialite">Specialite</label>
    <input type="text" name="specialite" id="specialite" value="{{ $professeur->specialite }}" required>
    <br>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
