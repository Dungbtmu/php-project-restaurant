<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http; // Import Http class


class MealController extends Controller
{
    // public function meal()
    // {
    //     $mealItems = Meal::with('gallery')->get(); // Lấy toàn bộ dữ liệu meal và liên kết với gallery
    //     return view('meal', ['mealItems' => $mealItems]);
    // }


    public function view()
    {
        $meal = Meal::all();
        return view('meal-admin', ['meal' => $meal]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'meal_name' => 'required',
            'item' => 'required',
        ]);

        $meal = new Meal();
        $meal->meal_name = $request->input('meal_name');

        $item = $request->input('item');
        $gallery = Gallery::where('item', $item)->first();

        if ($gallery) {
            $meal->gallery_id = $gallery->id; 
            $meal->save();
        }

        return redirect('/meal-admin')->with('success', 'Meal created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'meal_name' => 'required',
            'item' => 'required'
        ]);
    
        $meal = Meal::find($id);
    
        if (!$meal) {
            return redirect()->back()->with('error', 'meal item not found.');
        }
    
        $meal->item = $request->input('item');
        $meal->price = $request->input('price');
        $meal->description = $request->input('description');
    
        $meal->save();
    
        return redirect('/gallery-admin')->with('success', 'Gallery item updated successfully.');
    }

    public function delete($id)
    {
        $meal = Meal::find($id);
        if ($meal) {
            $meal->delete();
            return redirect('/meal-admin')->with('success', 'Item record deleted successfully.');
        } else {
            return redirect('/meal-admin')->with('error', 'Item record not found.');
        }
    }

    public function show($id)
    {
        $meals = Meal::find($id);

        if (!$meals) {
            return response()->json(['error' => 'meals not found'], 404);
        }

        return response()->json($meals);
    }

    public function getGalleryIdsByMealName($mealName)
{
    $meals = Meal::where('meal_name', $mealName)->get();

    if ($meals->isEmpty()) {
        return response()->json(['error' => 'Meals not found'], 404);
    }

    $galleryIds = $meals->pluck('gallery_id')->toArray();

    return response()->json(['gallery_ids' => $galleryIds]);
}

public function showMealWithGalleryDetails($mealName)
{
    $meals = Meal::with('galleryItems')->where('gallery_id', $galleryId)->get();

    if ($meals->isEmpty()) {
        return response()->json(['error' => 'Meals not found'], 404);
    }

    return view('meal', ['meals' => $meals]);
}


} 