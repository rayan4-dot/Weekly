@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Categories</h1>
            <a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition duration-200 ease-in-out">
                Create Category
            </a>
        </div>

        @if(count($categories) > 0)
            <ul class="bg-white rounded-lg shadow overflow-hidden">
                @foreach ($categories as $category)
                    <li class="border-b border-gray-200 last:border-b-0">
                        <div class="flex items-center justify-between px-6 py-4">
                            <span class="text-gray-700 font-medium">{{ $category->name }}</span>
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-800 border border-indigo-600 hover:border-indigo-800 rounded px-3 py-1 font-medium transition duration-200 ease-in-out">
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 border border-red-600 hover:border-red-800 rounded px-3 py-1 font-medium transition duration-200 ease-in-out"
                                    onclick="confirm('Are you sure you want to delete?')">
                                    Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <p class="text-gray-500">No categories found</p>
            </div>
        @endif
    </div>
@endsection