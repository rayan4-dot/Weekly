@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8">
        <h1 class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">
            Nouvelle annonce
        </h1>
        <p class="mt-2 text-gray-600">Créez une nouvelle annonce pour vendre vos articles</p>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 p-8">
        <form action="{{ route('annonces.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="titre" class="block text-sm font-semibold text-gray-700 mb-2">
                        Titre de l'annonce
                    </label>
                    <input 
                        type="text" 
                        name="titre" 
                        id="titre" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-white/50 backdrop-blur-sm" 
                        placeholder="Ex: iPhone 14 Pro en excellent état"
                        required
                    >
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Description détaillée
                    </label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="5"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-white/50 backdrop-blur-sm" 
                        placeholder="Décrivez votre article en détail..."
                        required
                    ></textarea>
                </div>

                <div>
                    <label for="prix" class="block text-sm font-semibold text-gray-700 mb-2">
                        Prix (€)
                    </label>
                    <div class="relative">
                        <input 
                            type="number" 
                            name="prix" 
                            id="prix" 
                            step="0.01"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-white/50 backdrop-blur-sm pl-8"
                            placeholder="0.00"
                        >
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">€</span>
                    </div>
                </div>

                <div>
                    <label for="categorie_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        Catégorie
                    </label>
                    <select 
                        name="categorie_id" 
                        id="categorie_id" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-white/50 backdrop-blur-sm" 
                        required
                    >
                        <option value="">Sélectionnez une catégorie</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                        Image (URL)
                    </label>
                    <input 
                        type="url" 
                        name="image" 
                        id="image" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-white/50 backdrop-blur-sm"
                        placeholder="https://exemple.com/image.jpg"
                    >
                    <p class="text-xs text-gray-500 mt-1">Ajoutez l'URL d'une image pour illustrer votre annonce</p>
                </div>

                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                        Statut de publication
                    </label>
                    <select 
                        name="status" 
                        id="status" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-white/50 backdrop-blur-sm" 
                        required
                    >
                        <option value="actif">🟢 Actif (publique)</option>
                        <option value="brouillon">📝 Brouillon (privé)</option>
                        <option value="archivé">📦 Archivé</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-between pt-8 border-t border-gray-200">
                <a href="{{ route('annonces.index') }}" 
                   class="px-6 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors font-medium">
                    Annuler
                </a>
                <button 
                    type="submit" 
                    class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Publier l'annonce
                </button>
            </div>
        </form>
    </div>
</div>
@endsection