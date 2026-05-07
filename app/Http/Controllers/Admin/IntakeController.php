<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intake;
use Illuminate\Http\Request;

class IntakeController extends Controller
{
    public function index()
    {
        $intakes = Intake::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.intakes.index', compact('intakes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:intakes,name',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        Intake::create([
            'name' => $validated['name'],
            'start_date' => $validated['start_date'] ?? null,
            'end_date' => $validated['end_date'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => true,
        ]);

        return back()->with('success', 'Intake created successfully.');
    }

    public function update(Request $request, Intake $intake)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:intakes,name,' . $intake->id,
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $intake->update([
            'name' => $validated['name'],
            'start_date' => $validated['start_date'] ?? null,
            'end_date' => $validated['end_date'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return back()->with('success', 'Intake updated successfully.');
    }

    public function destroy(Intake $intake)
    {
        $intake->delete();
        return back()->with('success', 'Intake deleted successfully.');
    }
}

