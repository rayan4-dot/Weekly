@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                Catégories
            </h1>
            <p class="mt-2 text-gray-600">Gérez vos catégories d'annonces</p>
        </div>
        <a href="{{ route('categories.create') }}" 
           class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
            Nouvelle catégorie
        </a>
    </div>

    @if($categories->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $categorie)
                <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-6 hover:shadow-xl transition-all duration-200 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $categorie->nom }}</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('categories.edit', $categorie) }}" 
                               class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">
                            <span class="font-medium">Slug:</span> 
                            <code class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $categorie->slug }}</code>
                        </p>
                        <p class="text-sm text-gray-600">
                            <span class="font-medium">Annonces:</span> 
                            <span class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-xs font-medium">
                                {{ $categorie->annonces_count ?? 0 }}
                            </span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune catégorie</h3>
            <p class="text-gray-600 mb-6">Commencez par créer votre première catégorie</p>
            <a href="{{ route('categories.create') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
                Créer une catégorie
            </a>
        </div>
    @endif
</div>
@endsection
