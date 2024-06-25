<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Header;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $color = Color::all();
        return view('site.color.index' , [
            'colors' => $color
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Color::create([
           'color' => $request->color,
            'font' => $request->font,
            'size' => $request->size
        ]);
        return redirect()->route('color');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return view('site.color.show' , [
            'color' => $color
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('site.color.edit' , [
            'color' => $color
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $color->update([
            'color' => $request->color,
            'font' => $request->font,
            'size' => $request->size

        ]);
        return redirect()->route('color');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
    $color->delete();
    return redirect()->route('color');
    }
}
