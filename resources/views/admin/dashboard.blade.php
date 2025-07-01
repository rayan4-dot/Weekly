@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <div class="container mx-auto py-12 px-4">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full mb-4 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h1 class="text-5xl font-extrabold bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                Tableau de Bord Admin
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Gérez votre marketplace avec des outils puissants et une interface intuitive
            </p>
        </div>

        <!-- Admin Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Categories Management Card -->
            <div class="group relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
                <a href="{{ route('categories.index') }}" class="relative block">
                    <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                        <div class="flex flex-col items-center text-center space-y-4">
                            <!-- Icon Container -->
                            <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-blue-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            
                            <!-- Content -->
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">Gérer les Catégories</h3>
                                <p class="text-gray-600">Organisez et structurez vos catégories d'annonces</p>
                            </div>
                            
                            <!-- Stats -->
                            <div class="w-full pt-4 border-t border-gray-100">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Total:</span>
                                    <span class="font-semibold text-purple-600">{{ $categories_count ?? '0' }}</span>
                                </div>
                            </div>
                            
                            <!-- Action Arrow -->
                            <div class="flex items-center text-purple-600 font-semibold group-hover:text-purple-700">
                                <span class="mr-2">Accéder</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Announcements Management Card -->
            <div class="group relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
                <a href="{{ route('annonces.index') }}" class="relative block">
                    <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                        <div class="flex flex-col items-center text-center space-y-4">
                            <!-- Icon Container -->
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                            
                            <!-- Content -->
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">Gérer les Annonces</h3>
                                <p class="text-gray-600">Modérez et administrez toutes les annonces</p>
                            </div>
                            
                            <!-- Stats -->
                            <div class="w-full pt-4 border-t border-gray-100">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Total:</span>
                                    <span class="font-semibold text-blue-600">{{ $annonces_count ?? '0' }}</span>
                                </div>
                            </div>
                            
                            <!-- Action Arrow -->
                            <div class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                                <span class="mr-2">Accéder</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Quick Stats Section -->
        <div class="mt-16 max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Aperçu Rapide</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white/70 backdrop-blur-sm rounded-xl p-6 text-center shadow-lg border border-white/20">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">{{ $active_annonces ?? '0' }}</p>
                    <p class="text-sm text-gray-600">Annonces Actives</p>
                </div>
                
                <div class="bg-white/70 backdrop-blur-sm rounded-xl p-6 text-center shadow-lg border border-white/20">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">{{ $total_users ?? '0' }}</p>
                    <p class="text-sm text-gray-600">Utilisateurs</p>
                </div>
                
                <div class="bg-white/70 backdrop-blur-sm rounded-xl p-6 text-center shadow-lg border border-white/20">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-1l-4 4z"/>
                        </svg>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">{{ $total_comments ?? '0' }}</p>
                    <p class="text-sm text-gray-600">Commentaires</p>
                </div>
                
                <div class="bg-white/70 backdrop-blur-sm rounded-xl p-6 text-center shadow-lg border border-white/20">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">{{ $categories_count ?? '0' }}</p>
                    <p class="text-sm text-gray-600">Catégories</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection