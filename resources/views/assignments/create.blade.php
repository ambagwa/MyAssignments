@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Create Assignment</h1>
    <form action="{{ route('assignments.store') }}" method="POST">
        @csrf
        @include('assignments._form', ['assignment' => null])
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
