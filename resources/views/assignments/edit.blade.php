@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Edit Assignment</h1>
    <form action="{{ route('assignments.update', $assignment) }}" method="POST">
        @csrf
        @method('PUT')
        @include('assignments._form', ['assignment' => $assignment])
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
