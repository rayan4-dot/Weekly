@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Modifier l'annonce</h1>
    <form action="{{ route('annonces.update', $annonce) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="titre" class="block font-semibold">Titre</label>
            <input type="text" name="titre" id="titre" class="w-full border rounded p-2" value="{{ old('titre', $annonce->titre) }}" required>
        </div>
        <div>
            <label for="description" class="block font-semibold">Description</label>
            <textarea name="description" id="description" class="w-full border rounded p-2" required>{{ old('description', $annonce->description) }}</textarea>
        </div>
        <div>
            <label for="prix" class="block font-semibold">Prix</label>
            <input type="number" name="prix" id="prix" class="w-full border rounded p-2" value="{{ old('prix', $annonce->prix) }}">
        </div>
        <div>
            <label for="image" class="block font-semibold">Image (URL)</label>
            <input type="text" name="image" id="image" class="w-full border rounded p-2" value="{{ old('image', $annonce->image) }}">
        </div>
        <div>
            <label for="categorie_id" class="block font-semibold">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="w-full border rounded p-2" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" @if($annonce->categorie_id == $categorie->id) selected @endif>{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="status" class="block font-semibold">Statut</label>
            <select name="status" id="status" class="w-full border rounded p-2" required>
                <option value="actif" @if($annonce->status == 'actif') selected @endif>Actif</option>
                <option value="brouillon" @if($annonce->status == 'brouillon') selected @endif>Brouillon</option>
                <option value="archivé" @if($annonce->status == 'archivé') selected @endif>Archivé</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection 