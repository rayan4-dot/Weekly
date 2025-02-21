@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Edit Announcement</h1>

    <form action="{{ route('announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')

        <!-- Title Field -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                value="{{ old('title', $announcement->title) }}" 
                required 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
            @error('title')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description Field -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea 
                id="description" 
                name="description" 
                required 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >{{ old('description', $announcement->description) }}</textarea>
            @error('description')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Category Field -->
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category:</label>
            <select 
                id="category_id" 
                name="category_id" 
                required 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $announcement->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
            <input 
                type="file" 
                id="image" 
                name="image" 
                class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md"
            >
            @error('image')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status Field -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
            <select 
                id="status" 
                name="status" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
                <option value="active" {{ $announcement->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="draft" {{ $announcement->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="archived" {{ $announcement->status == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
            @error('status')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Update</button>
        </div>
    </form>
</div>
@endsection
