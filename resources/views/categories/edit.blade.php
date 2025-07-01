@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8">
        <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
            Modifier la catégorie
        </h1>
        <p class="mt-2 text-gray-600">Modifiez les informations de la catégorie "{{ $categorie->nom }}"</p>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 p-8">
        <form action="{{ route('categories.update', $categorie) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-2">
                <label for="nom" class="block text-sm font-semibold text-gray-700">
                    Nom de la catégorie
                </label>
                <input 
                    type="text" 
                    name="nom" 
                    id="nom" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors bg-white/50 backdrop-blur-sm" 
                    value="{{ old('nom', $categorie->nom) }}" 
                    required
                >
            </div>

            <div class="space-y-2">
                <label for="slug" class="block text-sm font-semibold text-gray-700">
                    Slug (URL)
                </label>
                <input 
                    type="text" 
                    name="slug" 
                    id="slug" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors bg-white/50 backdrop-blur-sm" 
                    value="{{ old('slug', $categorie->slug) }}" 
                    required
                >
                <p class="text-xs text-gray-500">Le slug est utilisé dans l'URL (lettres minuscules, tirets uniquement)</p>
            </div>

            <div class="flex items-center justify-between pt-6">
                <a href="{{ route('categories.index') }}" 
                   class="px-6 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors font-medium">
                    Annuler
                </a>
                <button 
                    type="submit" 
                    class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection