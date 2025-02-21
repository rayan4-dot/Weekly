@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Create Announcement</h1>

    <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf

        <div class="mb-4">
            <label for="title" class="text-gray-700 font-medium">Title</label>
            <input type="text" name="title" id="title" required class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="description" class="text-gray-700 font-medium">Description</label>
            <textarea name="description" id="description" required class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <!-- <div class="mb-4">
            <label for="price" class="text-gray-700 font-medium">Price</label>
            <input type="number" name="price" id="price" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div> -->

        <div class="mb-4">
            <label for="category" class="text-gray-700 font-medium">Category</label>
            <select name="category_id" id="category" required class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="text-gray-700 font-medium">Image</label>
            <input type="file" name="image" id="image" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" class="w-full py-3 mt-4 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition duration-200 ease-in-out">
            Create Announcement
        </button>
    </form>
</div>
@endsection
