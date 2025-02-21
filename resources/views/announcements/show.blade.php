@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        @if ($announcement->image)
            <img src="{{ asset('storage/' . $announcement->image) }}" alt="Announcement Image" class="w-full h-64 object-cover">
        @endif

        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $announcement->title }}</h1>
            <p class="text-gray-700 mt-2">{{ $announcement->description }}</p>

            <div class="mt-4 flex justify-between text-gray-500 text-sm">
                <span>By {{ $announcement->user->name ?? 'Unknown' }}</span>
                <span>{{ $announcement->created_at->diffForHumans() }}</span>
            </div>

            <div class="mt-6">
                <a href="{{ route('announcements.index') }}" class="text-blue-500 hover:underline">Back to Announcements</a>
            </div>
        </div>
    </div>
</div>
@endsection
