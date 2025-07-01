@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <div class="container mx-auto py-10 px-4">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 bg-white/60 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-white/20">
            <div class="mb-6 md:mb-0">
                <h1 class="text-4xl font-extrabold bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 bg-clip-text text-transparent mb-2">
                    Toutes les Annonces
                </h1>
                <p class="text-gray-600 text-lg">Découvrez {{ $annonces->total() }} annonces disponibles</p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4">
                <!-- Filter Dropdown -->
                <div class="relative">
                    <select class="appearance-none bg-white/80 backdrop-blur-sm border border-gray-200 rounded-xl px-6 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-lg">
                        <option>Toutes les catégories</option>
                        <option>Électronique</option>
                        <option>Vêtements</option>
                        <option>Maison</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Create Button -->
                <a href="{{ route('annonces.create') }}" class="group relative inline-flex items-center justify-center px-8 py-3 overflow-hidden font-bold text-white rounded-xl shadow-2xl">
                    <span class="absolute inset-0 w-full h-full transition duration-300 ease-out opacity-0 bg-gradient-to-br from-pink-600 via-purple-700 to-blue-400 group-hover:opacity-100"></span>
                    <span class="absolute top-0 left-0 w-full bg-gradient-to-b from-white to-transparent opacity-5 h-1/3"></span>
                    <span class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-white to-transparent opacity-5"></span>
                    <span class="absolute bottom-0 left-0 w-4 h-full bg-gradient-to-r from-white to-transparent opacity-5"></span>
                    <span class="absolute bottom-0 right-0 w-4 h-full bg-gradient-to-l from-white to-transparent opacity-5"></span>
                    <span class="absolute inset-0 w-full h-full border border-white rounded-xl opacity-10"></span>
                    <span class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-5"></span>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Nouvelle Annonce
                    </span>
                    <span class="absolute inset-0 bg-gradient-to-r from-purple-500 to-blue-600 rounded-xl -z-10"></span>
                </a>
            </div>
        </div>

        <!-- Announcements Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($annonces as $annonce)
                <div class="group relative">
                    <!-- Glow Effect -->
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl blur opacity-20 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
                    
                    <!-- Card Content -->
                    <div class="relative bg-white/90 backdrop-blur-sm rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            @if($annonce->status === 'actif')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-400 rounded-full mr-1"></span>
                                    Actif
                                </span>
                            @elseif($annonce->status === 'brouillon')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <span class="w-2 h-2 bg-yellow-400 rounded-full mr-1"></span>
                                    Brouillon
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full mr-1"></span>
                                    Archivé
                                </span>
                            @endif
                        </div>

                        <!-- Image Placeholder -->
                        <div class="w-full h-48 bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl mb-6 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            @if($annonce->image)
                                <img src="{{ $annonce->image }}" alt="{{ $annonce->titre }}" class="w-full h-full object-cover rounded-xl">
                            @else
                                <svg class="w-16 h-16 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="space-y-4">
                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-800 line-clamp-2 group-hover:text-purple-600 transition-colors duration-200">
                                {{ $annonce->titre }}
                            </h2>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm line-clamp-3">
                                {{ Str::limit($annonce->description, 120) }}
                            </p>

                            <!-- Price -->
                            @if($annonce->prix)
                                <div class="flex items-center">
                                    <span class="text-2xl font-bold text-purple-600">{{ number_format($annonce->prix, 0, ',', ' ') }}€</span>
                                </div>
                            @endif

                            <!-- Meta Information -->
                            <div class="flex items-center justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                                <div class="flex items-center space-x-4">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                        {{ $annonce->categorie->nom ?? 'Aucune' }}
                                    </span>
                                </div>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    {{ $annonce->user->name }}
                                </span>
                            </div>

                            <!-- Action Button -->
                            <div class="pt-4">
                                <a href="{{ route('annonces.show', $annonce) }}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transform transition-all duration-200 hover:scale-105 shadow-lg hover:shadow-xl">
                                    <span>Voir l'annonce</span>
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
            <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                {{ $annonces->links() }}
            </div>
        </div>

        <!-- Empty State -->
        @if($annonces->count() === 0)
            <div class="text-center py-16">
                <div class="mx-auto w-24 h-24 bg-gradient-to-br from-purple-100 to-blue-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-12 h-12 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Aucune annonce trouvée</h3>
                <p class="text-gray-600 mb-8">Commencez par créer votre première annonce pour démarrer.</p>
                <a href="{{ route('annonces.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transform transition-all duration-200 hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Créer une annonce
                </a>
            </div>
        @endif
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection