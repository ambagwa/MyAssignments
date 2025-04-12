{{-- resources/views/welcome.blade.php --}}
<x-guest-layout>
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">Welcome to Student Task Manager</h1>
        <p class="mb-6">Please sign up or log in to continue.</p>
        <div class="space-x-4">
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Sign Up</a>
            <a href="{{ route('login') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Log In</a>
        </div>
    </div>
</x-guest-layout>
