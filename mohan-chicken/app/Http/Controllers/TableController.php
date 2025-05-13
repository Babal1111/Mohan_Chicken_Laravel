<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('tables.index', compact('tables'));
    }

    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'table_number' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|string',
        ]);
        Table::create($validated);
        return redirect()->route('tables.index')->with('success', 'Table added!');
    }

    public function show(Table $table)
    {
        return view('tables.show', compact('table'));
    }

    public function edit(Table $table)
    {
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, Table $table)
    {
        $validated = $request->validate([
            'table_number' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|string',
        ]);
        $table->update($validated);
        return redirect()->route('tables.index')->with('success', 'Table updated!');
    }

    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Table deleted!');
    }
}
