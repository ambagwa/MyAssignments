<!--Option for reusable forms -->

<div class="mb-4">
    <label class="block font-medium mb-1">Title</label>
    <input type="text" name="title" value="{{ old('title', $assignment->title ?? '') }}" class="w-full border px-3 py-2 rounded">
    @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block font-medium mb-1">Description</label>
    <textarea name="description" class="w-full border px-3 py-2 rounded">{{ old('description', $assignment->description ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block font-medium mb-1">Due Date</label>
    <input type="date" name="due_date" value="{{ old('due_date', $assignment->due_date ?? '') }}" class="w-full border px-3 py-2 rounded">
    @error('due_date') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
</div>

@if(isset($assignment) && request()->routeIs('assignments.edit'))
<div class="mb-4">
    <label class="block font-medium mb-1">Status</label>
    <select name="status" class="w-full border px-3 py-2 rounded">
        <option value="pending" {{ $assignment->status === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="completed" {{ $assignment->status === 'completed' ? 'selected' : '' }}>Completed</option>
    </select>
</div>
@endif
