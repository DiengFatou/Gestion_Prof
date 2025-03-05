<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
class ProfesseurController extends Controller
{
    /**
     * Liste tous les profs.
     */
    public function index()
    {
        try {
            $professeurs = Professeur::all();
            return view('index', compact('professeurs'));
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de la récupération des profs',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Affiche le formulaire pour ajouter un nouveau prof.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Ajoute une nouveau prof dans la base de donnees.
     */
    public function store(CreatePostRequest $request)
    {
        try {
            $professeur = Professeur::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'specialite' => $request->specialite,
                'telephone' => $request->telephone,
            ]);

            return redirect()->route('professeurs.index')->with('success', 'Prof ajoutee avec succes');
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de l\'ajout du prof',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Affiche le formulaire pour modifier un prof.
     */
    public function edit($id)
    {
        $professeur = Professeur::findOrFail($id);
        return view('edit', compact('professeur')); // Affiche le formulaire d'édition avec le prof
    }

    /**
     * Met a jour d'un prof existant.
     */
    public function update(EditPostRequest $request, $id)
    {
        try {
            $professeur = Professeur::findOrFail($id);
            $professeur->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'specialite' => $request->specialite,
                'telephone' => $request->telephone,
            ]);

            return redirect()->route('professeurs.index')->with('success', 'Prof mise a jour avec succes');
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de la mise a jour du prof',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Supprime un prof.
     */
    public function destroy($id)
    {
        try {
            $professeur = Professeur::findOrFail($id);
            $professeur->delete();

            return redirect()->route('professeurs.index')->with('success', 'Prof supprimee avec succes');
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de la suppression du prof',
                'error' => $e->getMessage()
            ]);
        }
    }
}
