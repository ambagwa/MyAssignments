@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">My Assignments</h1>

    <a href="{{ route('assignments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Assignment</a>

    @if(session('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @endif

    <ul class="mt-6 space-y-4">
        @foreach ($assignments as $assignment)
            <li class="border p-4 rounded shadow">
                <h2 class="text-lg font-semibold">{{ $assignment->title }}</h2>
                <p class="text-sm text-gray-600">{{ $assignment->description }}</p>
                <p>Due: {{ \Carbon\Carbon::parse($assignment->due_date)->format('M d, Y') }}</p>
                <p>Status: <span class="{{ $assignment->status == 'completed' ? 'text-green-600' : 'text-yellow-600' }}">{{ ucfirst($assignment->status) }}</span></p>

                <div class="mt-2">
                    <a href="{{ route('assignments.edit', $assignment) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('assignments.destroy', $assignment) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this assignment?')" class="text-red-500">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
