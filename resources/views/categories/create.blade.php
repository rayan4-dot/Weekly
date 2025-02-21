<!-- resources/views/categories/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create Category</h1>
        <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="text-gray-700 font-medium">Category Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <button type="submit" class="w-full py-3 mt-4 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition duration-200 ease-in-out">
                Create Category
            </button>
        </form>
    </div>
@endsection
