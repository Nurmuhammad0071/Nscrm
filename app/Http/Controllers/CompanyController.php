<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all();
        return view('site.company.index' , [
            'companies' => $company
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'image|max:8192',
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'hours' => 'required',
            'location' => 'required'
        ]);
        if ($request->hasFile('logo')){
            $path = $request->file('logo')->store('logo');
        }
        Company::create([
            'logo' => $path ?? 'img.jpg',
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'phones' => $request->phones,
            'email' => $request->email,
            'hours' => $request->hours,
            'location' => $request->location
        ]);
        return redirect()->route('company');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('site.company.show' , [
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('site.company.edit' , [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'logo' => 'image|max:8192',
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'hours' => 'required',
            'location' => 'required'
        ]);
if($request->hasFile('logo')){
    if (isset($company->logo)){
        Storage::delete($company->logo);
    }
    $path = $request->file('logo')->store('logo');
}
        $company->update([
            'logo' => $path ?? $company->logo,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'phones' => $request->phones,
            'email' => $request->email,
            'hours' => $request->hours,
            'location' => $request->location
        ]);
        return redirect()->route('company');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if (isset($company->logo)){
            Storage::delete($company->logo);
        }
        $company->delete();
        return redirect()->route('company');
    }
}
