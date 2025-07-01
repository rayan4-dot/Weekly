@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- Annonce principale --}}
    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-gray-200/50 overflow-hidden mb-8">
        <div class="p-8 lg:p-12">
            <div class="flex flex-col lg:flex-row lg:items-start lg:space-x-12">
                {{-- Image --}}
                @if($annonce->image)
                    <div class="lg:w-1/2 mb-8 lg:mb-0">
                        <img src="{{ $annonce->image }}" 
                             alt="{{ $annonce->titre }}" 
                             class="w-full h-64 lg:h-80 object-cover rounded-2xl shadow-lg">
                    </div>
                @endif
                
                {{-- Contenu --}}
                <div class="lg:w-1/2 space-y-6">
                    <div>
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                            {{ $annonce->titre }}
                        </h1>
                        
                        @if($annonce->prix)
                            <div class="inline-block bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-3 rounded-2xl font-bold text-2xl shadow-lg">
                                {{ number_format($annonce->prix, 2) }} €
                            </div>
                        @endif
                    </div>

                    <div class="prose prose-lg text-gray-700 max-w-none">
                        <p>{{ $annonce->description }}</p>
                    </div>

                    {{-- Métadonnées --}}
                    <div class="flex flex-wrap gap-4 pt-6 border-t border-gray-200">
                        <div class="flex items-center space-x-2 text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <span class="font-medium">{{ $annonce->categorie->nom ?? 'Non catégorisé' }}</span>
                        </div>
                        
                        <div class="flex items-center space-x-2 text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="font-medium">{{ $annonce->user->name }}</span>
                        </div>
                        
                        <div class="flex items-center space-x-2 text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium">{{ $annonce->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Section des commentaires --}}
    <div class="bg-white/60 backdrop-blur-sm rounded-3xl shadow-xl border border-gray-200/50 p-8 lg:p-12">
        <div class="flex items-center space-x-3 mb-8">
            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
            <h2 class="text-3xl font-bold text-gray-900">
                Commentaires 
                <span class="text-lg font-normal text-gray-500">({{ $annonce->commentaires->count() }})</span>
            </h2>
        </div>

        {{-- Liste des commentaires --}}
        <div class="space-y-6 mb-8">
            @forelse($annonce->commentaires as $commentaire)
                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-md border border-gray-200/30 hover:shadow-lg transition-all duration-200">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">
                                        {{ strtoupper(substr($commentaire->user->name, 0, 1)) }}
                                    </span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $commentaire->user->name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $commentaire->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <p class="text-gray-700 leading-relaxed">{{ $commentaire->contenu }}</p>
                        </div>
                        
                        @can('delete', $commentaire)
                            <form action="{{ route('commentaires.destroy', $commentaire) }}" method="POST" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')"
                                    title="Supprimer le commentaire"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Aucun commentaire</h3>
                    <p class="text-gray-600">Soyez le premier à commenter cette annonce !</p>
                </div>
            @endforelse
        </div>

        {{-- Formulaire de commentaire --}}
        @auth
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-6 border border-indigo-200/30">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Ajouter un commentaire
                </h3>
                
                <form action="{{ route('commentaires.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                    
                    <div>
                        <textarea 
                            name="contenu" 
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors bg-white/70 backdrop-blur-sm resize-none" 
                            placeholder="Partagez votre avis, posez une question ou laissez un commentaire constructif..."
                            required
                        ></textarea>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600">
                            Connecté en tant que <span class="font-semibold text-indigo-600">{{ auth()->user()->name }}</span>
                        </p>
                        <button 
                            type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center space-x-2"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <span>Publier</span>
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-8 text-center border border-gray-200/50">
                <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Connectez-vous pour commenter</h3>
                <p class="text-gray-600 mb-6">Vous devez être connecté pour laisser un commentaire</p>
                <div class="flex items-center justify-center space-x-4">
                    <a href="{{ route('login') }}" 
                       class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
                        Se connecter
                    </a>
                    <a href="{{ route('register') }}" 
                       class="px-6 py-3 text-indigo-600 bg-white hover:bg-indigo-50 border border-indigo-200 font-semibold rounded-xl transition-colors">
                        S'inscrire
                    </a>
                </div>
            </div>
        @endauth
    </div>
    
    {{-- Actions flottantes --}}
    <div class="fixed bottom-8 right-8 flex flex-col space-y-3">
        @can('update', $annonce)
            <a href="{{ route('annonces.edit', $annonce) }}" 
               class="w-14 h-14 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center transform hover:scale-110"
               title="Modifier l'annonce">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </a>
        @endcan
        
        <a href="{{ route('annonces.index') }}" 
           class="w-14 h-14 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center transform hover:scale-110"
           title="Retour à la liste">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </a>
    </div>
</div>
@endsection 