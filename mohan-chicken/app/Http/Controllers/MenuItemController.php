<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('category')->get();
        return view('menu_items.index', compact('menuItems'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('menu_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image_path' => 'nullable|string',
        ]);
        MenuItem::create($validated);
        return redirect()->route('menu-items.index')->with('success', 'Menu item added!');
    }

    public function show(MenuItem $menuItem)
    {
        return view('menu_items.show', compact('menuItem'));
    }

    public function edit(MenuItem $menuItem)
    {
        $categories = Category::all();
        return view('menu_items.edit', compact('menuItem', 'categories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image_path' => 'nullable|string',
        ]);
        $menuItem->update($validated);
        return redirect()->route('menu-items.index')->with('success', 'Menu item updated!');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu-items.index')->with('success', 'Menu item deleted!');
    }
}
