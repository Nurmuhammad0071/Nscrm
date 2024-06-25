<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Month;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $month = Month::all();
        return view('crm.month.month' , [
            'months' => $month
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.month.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|max:255',
            'year' => 'required|max:255',


        ]);
        $users = User::all();
        $month = Month::create([
            'month' => $request->month,
            'year' => $request->year,
            'comment' => $request->comment,
            'status' => $request->status ?? 0
        ]);
            foreach ($users as $user) {
                if ($user->status == 1) {
                Payment::create([
                    'month_id' => $month->id,
                    'user_id' => $user->id,
                ]);
            }
        }
        return redirect()->route('month');
    }

    /**
     * Display the specified resource.
     */
    public function show(Month $month)
    {
        return view('crm.month.show' , [
            'month' => $month
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Month $month)
    {
        return view('crm.month.edite' , [
            'month' => $month
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Month $month)
    {
        $request->validate([
            'month' => 'required|max:255',
            'year' => 'required|max:255',


        ]);
        $month->update([
            'month' => $request->month,
            'year' => $request->year,
            'comment' => $request->comment,
            'status' => $request->status ?? 0
        ]);

        return redirect()->route('month.show' , ['month' => $month->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Month $month)
    {
        $month->delete();
        return redirect()->route('month');
    }
}
