<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::all();
        return view('crm.course.course' , [
            'courses' => $course
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.course.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'prise' => 'required|max:255',
            'days' => 'required|max:255',
        ]);
        $course =  Course::create([
            'name' => $request->name,
            'info' => $request->info,
            'prise' => intval(str_replace(' ', '', $request->prise)),
            'days' => $request->days,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('course.show' , ['course' => $course->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('crm.course.show' , [
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
            return view('crm.course.edite' , [
                'course' => $course
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|max:255',
            'prise' => 'required|max:255 ',
            'days' => 'required|max:255',
        ]);
      $course->update([
            'name' => $request->name,
            'info' => $request->info,
            'prise' => intval(str_replace(' ', '',$request->prise)),
            'days' => $request->days,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('course.show' , ['course' => $course->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
      $course->delete();
      return redirect()->route('course');
    }
}
