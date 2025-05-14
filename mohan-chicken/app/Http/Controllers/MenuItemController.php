<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;
 
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
            // 'description' => 'nullable|string',
            'price' => 'required|numeric',
            // 'category_id' => 'required|exists:categories,id',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('menu', 'public');
            $validated['image_path'] = $imagePath; // Store the path as a string
        }
    
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
            // 'description' => 'nullable|string',
            'price' => 'required|numeric',
            // 'category_id' => 'required|exists:categories,id',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Fix validation rule
        ]);
    
        // Handle image upload (if a new image is provided)
        if ($request->hasFile('image_path')) {
            // Delete the old image (optional)
            if ($menuItem->image_path) {
                Storage::disk('public')->delete($menuItem->image_path);
            }
            // Store the new image
            $imagePath = $request->file('image_path')->store('menu', 'public');
            $validated['image_path'] = $imagePath;
        }
    
        $menuItem->update($validated);
        return redirect()->route('menu-items.index')->with('success', 'Menu item updated!');
    }
    

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu-items.index')->with('success', 'Menu item deleted!');
    }
}
