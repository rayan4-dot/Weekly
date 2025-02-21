@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Announcements</h1>
    <a href="{{ route('announcements.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200 ease-in-out">Create Announcement</a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        @foreach ($announcements as $announcement)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            @if ($announcement->image)
    <img src="{{ asset('storage/' . $announcement->image) }}" alt="Announcement Image" class="w-full h-48 object-cover">
@else
    <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-gray-600">
        No Image
    </div>
@endif


                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-900">{{ $announcement->title }}</h2>
                    <p class="text-gray-700 mt-2">{{ Str::limit($announcement->description, 100) }}</p>
                    
                    <div class="mt-4 flex justify-between items-center text-gray-500 text-sm">
                        <span>By {{ $announcement->user->name ?? 'Unknown' }}</span>
                        <span>{{ $announcement->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('announcements.show', $announcement) }}" class="text-blue-500 hover:underline">View</a>
                        <div>
                            <a href="{{ route('announcements.edit', $announcement) }}" class="text-yellow-500 hover:underline">Edit</a>
                            <form action="{{ route('announcements.destroy', $announcement) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $announcements->links() }}
    </div>
</div>
@endsection
