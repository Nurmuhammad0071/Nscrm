<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $group = Group::latest()->get();
        return view('crm.group.group' , [
            'groups' => $group,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = Course::all();
        $teacher = Teacher::all();
        return view('crm.group.create' , [
            'courses' => $course,
            'teachers' => $teacher
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'level' => 'required|max:255',
            'course_id' => 'required|max:255',
            'teacher_id' => 'required|max:255',
        ]);
        $group =  Group::create([
            'name' => $request->name,
            'level' => $request->level,
            'asistente' => $request->asistente,
            'comment' => $request->comment,
            'tg_group' => $request->tg_group,
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('group');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('crm.group.show' , [
            'group' => $group
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $teacher = Teacher::all();
        $course = Course::all();
        $resent_course = Course::where('id', '!=', $group->course_id)->get();
        $resent_teacher = Teacher::where('id', '!=', $group->teacher_id)->get();

        return view('crm.group.edite' , [
            'group' => $group,
            'courses' => $course,
            'teachers' => $teacher,
            'resent_course' => $resent_course,
            'resent_teacher' => $resent_teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|max:255',
            'level' => 'required|max:255',
            'course_id' => 'required|max:255',
            'teacher_id' => 'required|max:255',
        ]);
        $group->update([
            'name' => $request->name,
            'level' => $request->level,
            'asistente' => $request->asistente,
            'comment' => $request->comment,
            'tg_group' => $request->tg_group,
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('group.show',['group' => $group->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();

        // Redirect back to the group listing or any other desired page
        return redirect()->route('group');
    }
}
