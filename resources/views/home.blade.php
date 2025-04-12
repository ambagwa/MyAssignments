{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 text-center">
    <h1 class="text-3xl font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h1>
    <p class="text-gray-700 text-lg mb-6">
        This is your personal assignment tracker. You can add, manage, and complete your tasks right here.
    </p>
    <a href="{{ route('assignments.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded shadow hover:bg-blue-600">
        Go to My Assignments
    </a>
</div>
@endsection
