<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view('site.about.index' , [
            'abouts' => $about
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'image|max:8192',
            'paragraph' => 'required',
            'video' => 'required'
        ]);
        if ($request->hasFile('photo')){
            $path = $request->file('photo')->store('photo');
        }
        About::create([
            'photo' => $path ?? 'img.jpg',
            'paragraph' => $request->paragraph,
            'video' => $request->video
        ]);
        return redirect()->route('about');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('site.about.show' , [
            'about' => $about
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('site.about.edit' , [
            'about' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'photo' => 'image|max:8192',
            'paragraph' => 'required',
            'video' => 'required'
        ]);
        if ($request->hasFile('photo')){
            if($about->photo){
                Storage::delete($about->photo);
            }
            $path = $request->file('photo')->store('photo');

        }
        $about->update([
            'photo' => $path ?? $about->photo,
            'paragraph' => $request->paragraph,
            'video' => $request->video

        ]);
        return redirect()->route('about');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        if (isset($about->photo)){
            Storage::delete($about->photo);
        }
        $about->delete();
        return redirect()->route('about');
    }
}
