<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Link;
use Illuminate\Http\Request;
use Termwind\Components\Li;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $link = Link::all();
        return view('site.link.index' , [
            'links' => $link
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Link::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'link' => $request->link
        ]);
        return redirect()->route('link');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        return view('site.link.show' , [
            'link' => $link
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('site.link.edit' , [
            'link' => $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $link->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'link' => $request->link

        ]);
        return redirect()->route('link');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('link');
    }
}
