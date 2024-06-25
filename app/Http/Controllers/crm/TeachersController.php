<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = \Illuminate\Support\Carbon::now();
        $teacher = Teacher::all();
        return view('crm.teacher.teacher' , [
            'teachers' => $teacher,
            'now' => $now
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Teacher $teacher)
    {
        return view('crm.teacher.create' , [
            'teacher' => $teacher
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'image|max:9216',
            'name' => 'required|max:255',
            'phone_1' => 'required|max:255',
            'email' => 'required|max:255|unique:App\Models\Teacher,email',
            'password' => 'required|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('teacher');

        }

        $teacher =  Teacher::create([
            'photo' => $path ?? 'img.png',
            'name' => $request->name,
            'lastname' => $request->lastname,
            'patronymic' => $request->patronymic,
            'phone_1' => $request->phone_1,
            'phone_2' => $request->phone_2,
            'email' => $request->email,
            'password' => $request->password,
            'science' => $request->science,
            'birthday' =>$request->birthday,
            'comment' => $request->comment,
            'comming' => $request->comming,
            'intership' => $request->Intership,
            'percetage' =>$request->percetage,
            'link' => $request->link,
            'address' => $request->address,
            'telegram' => $request->telegram,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('teacher.show' , ['teacher' => $teacher->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('crm.teacher.show' , [
            'teacher' => $teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('crm.teacher.edite' , [
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'photo' => 'image|max:9216',
            'name' => 'required|max:255',
            'phone_1' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'max:255',
        ]);

        if ($request->hasFile('photo')) {
            if ($teacher->photo === 'img.png'){
                echo 'Success';
            }else {
                if (isset($teacher->photo)) {
                    Storage::delete($teacher->photo);
                }
            }
            $path = $request->file('photo')->store('teacher');

        }

        $teacher->update([
            'photo' => $path ?? $teacher->photo,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'patronymic' => $request->patronymic,
            'phone_1' => $request->phone_1,
            'phone_2' => $request->phone_2,
            'email' => $request->email,
            'password' => $request->password ?? $teacher->password,
            'science' => $request->science,
            'birthday' =>$request->birthday,
            'comment' => $request->comment,
            'comming' => $request->comming,
            'intership' => $request->Intership,
            'percetage' =>$request->percetage,
            'link' => $request->link,
            'address' => $request->address,
            'telegram' => $request->telegram,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('teacher.show' , ['teacher' => $teacher->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {

        if ($teacher->photo ===  'img.png'){
            $teacher->delete();
        }else{
            if (isset($teacher->photo)){
                Storage::delete($teacher->photo);
            }
            $teacher->delete();

        }

        return redirect()->route('admin_teacher');
    }
}
