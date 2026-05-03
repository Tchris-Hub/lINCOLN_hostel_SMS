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
            'sort_order' => 'nullable|integer|min:0',
        ]);

        Intake::create([
            'name' => $validated['name'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => true,
        ]);

        return back()->with('success', 'Intake created successfully.');
    }

    public function update(Request $request, Intake $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:intakes,name,' . $department->id,
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $department->update([
            'name' => $validated['name'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return back()->with('success', 'Intake updated successfully.');
    }

    public function destroy(Intake $department)
    {
        $department->delete();
        return back()->with('success', 'Intake deleted successfully.');
    }
}

