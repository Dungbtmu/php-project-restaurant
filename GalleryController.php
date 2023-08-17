<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function gallery()
    {
        $galleryItems = Gallery::all();
        return view('gallery', ['galleryItems' => $galleryItems]);
    }

    public function view()
    {
        $gallery = Gallery::all();
        return view('gallery-admin', ['gallery' => $gallery]);

    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'path' => 'required|mimetypes:image/jpeg,image/png,image/gif,video/mp4|max:65536',
        ]);

        $item = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        
        if ($request->hasFile('path')) {
            $galleryUrl = $request->file('path');
            $galleryPath = $galleryUrl->store('public/gallery');
            $path = '/storage/gallery/' . basename($galleryPath);
        }

        $gallery = new Gallery();
        $gallery->item = $item;
        $gallery->price = $price;
        $gallery->path = $path;
        $gallery->description = $description;
        $gallery->save();

        return redirect('/gallery-admin');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
    
        $gallery = Gallery::find($id);
    
        if (!$gallery) {
            return redirect()->back()->with('error', 'Gallery item not found.');
        }
    
        $gallery->item = $request->input('item');
        $gallery->price = $request->input('price');
        $gallery->description = $request->input('description');
    
        $gallery->save();
    
        return redirect('/gallery-admin')->with('success', 'Gallery item updated successfully.');
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery) {
            $gallery->delete();
            return redirect('/gallery-admin')->with('success', 'Item record deleted successfully.');
        } else {
            return redirect('/gallery-admin')->with('error', 'Item record not found.');
        }
    }

    public function show($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json(['error' => 'Gallery not found'], 404);
        }

        return response()->json($gallery);
    }
}