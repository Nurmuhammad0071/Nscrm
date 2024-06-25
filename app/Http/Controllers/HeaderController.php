<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $head = Header::all();
        return view('site.header.index' , [
            'header' => $head
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:8192' ,
            'head' =>  'required',
            'paragraph' => 'required',
            'video' => 'required',

        ]);
        if ($request->hasFile('photo')){
            $path = $request->file('photo')->store('head');
        }
        Header::create([
            'photo' => $path ?? 'img.jpg',
            'head' => $request->head,
            'paragraph' => $request->paragraph,
            'video' => $request->video
        ]);
        return redirect()->route('header');
    }

    /**
     * Display the specified resource.
     */
    public function show(Header $header)
    {
        return view('site.header.show',[
            'header' => $header
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Header $header)
    {
        return view('site.header.edit' , [
            'header' => $header
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Header $header)
    {
        $request->validate([
            'photo' => 'image|max:8192' ,
            'head' =>  'required',
            'paragraph' => 'required',
            'video' => 'required',

        ]);
        if($request->hasFile('photo')){
            if (isset($header->photo)){
                Storage::delete($header->photo);
            }
            $path = $request->file('photo')->store('head');

        }
        $header->update([
            'photo' => $path ?? $header->photo,
            'head' => $request->head,
            'paragraph' => $request->paragraph,
            'video' => $request->video
        ]);
        return redirect()->route('header');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        if (isset($header->logo)){
            Storage::delete($header->logo);
        }
        $header->delete();
        return redirect()->route('header');
    }
}
