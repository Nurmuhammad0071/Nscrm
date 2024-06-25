<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('site.gallery.index' , [
            'galleries' => $gallery
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')){
            $path = $request->file('photo')->store('photo');
        }
         $gallery = Gallery::create([
            'photo' => $path ?? 'img.jpg',
        ]);
        return redirect()->route('gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('site.gallery.show' , [
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('site.gallery.edit' , [
            'gallery' => $gallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        if ($request->hasFile('photo')){
            if($gallery->photo){
                Storage::delete($gallery->photo);
            }
            $path = $request->file('photo')->store('photo');

        }
       $gallery->update([
           'photo' => $path ?? $gallery->photo,


       ]);
        return redirect()->route('gallery');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if (isset($gallery->photo)){
            Storage::delete($gallery->photo);
        }
        $gallery->delete();
        return redirect()->route('gallery');
    }
}
