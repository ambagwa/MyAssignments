<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the user's assignments.
     */
    public function index()
    {
        $assignments = auth()->user()->assignments()->latest()->get();
        return view('assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new assignment.
     */
    public function create()
    {
        return view('assignments.create');
    }

    /**
     * Store a newly created assignment in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        auth()->user()->assignments()->create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => 'pending',
        ]);

        return redirect()->route('assignments.index')->with('success', 'Assignment created successfully.');
    }

    /**
     * Show the form for editing the specified assignment.
     */
    public function edit(Assignment $assignment)
    {
        // Ensure the logged-in user owns the assignment
        $this->authorize('update', $assignment);
        return view('assignments.edit', compact('assignment'));
    }

    /**
     * Update the specified assignment in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        $this->authorize('update', $assignment);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:today',
            'status' => 'required|in:pending,completed',
        ]);

        $assignment->update($request->only(['title', 'description', 'due_date', 'status']));

        return redirect()->route('assignments.index')->with('success', 'Assignment updated successfully.');
    }

    /**
     * Remove the specified assignment from storage.
     */
    public function destroy(Assignment $assignment)
    {
        $this->authorize('delete', $assignment);
        $assignment->delete();

        return redirect()->route('assignments.index')->with('success', 'Assignment deleted successfully.');
    }
}
