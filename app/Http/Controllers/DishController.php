<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();
        return view('dishes.dishes', compact('dishes'));
    }

    /**
     * Store a newly created dish in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('dishes', 'public');
        }

        // Create new dish
        Dish::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath, // Store the image path
        ]);

        return redirect()->back()->with('success', 'Dish added successfully!');
    }

    public function edit(Dish $dish) {
        return view ('dishes.edit', ['dish' => $dish]);
    }

    public function update(Dish $dish, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

        $dish->update($data);

        return redirect(route('dishes'))->with('Success', 'Az eledel sikeresen módosítva');

    }
}
