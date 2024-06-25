<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = User::all();
        return view('crm.students.students' , [
            'students' => $student
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'photo' => 'image|max:9216',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255|unique:App\Models\User,email',
            'password' => 'required|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('student');

        }

        $student =  User::create([
            'photo' => $path ?? 'img.png',
            'name' => $request->name,
            'lastname' => $request->lastname,
            'patronymic' => $request->patronymic,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'comment' => $request->comment,
            'title' => $request->title,
            'comming' => $request->comming,
            'phone_2' => $request->phone_2,
            'phone_3' => $request->phone_3,
            'position' => $request->position,
            'address' => $request->address,
            'age' => $request->age,
            'active' => $request->active ?? 0,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('student.show' , ['student' => $student->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('crm.students.show' , [
            'user' => $user
        ]);
    }
    public function card($id){
        $user = User::find($id);
        $connectedGroups = $user->connectedGroups;
        $company = Company::all();

        return view('crm.students.card', [
            'user' => $user,
            'connectedGroups' => $connectedGroups,
            'company' => $company
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('crm.students.edite' , [
            'student' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'photo' => 'image|max:9216',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'max:255',
        ]);

        if ($request->hasFile('photo')) {
            if ($user->photo == 'img.png'){
                    echo 'Success';
            }else {
                if (isset($user->photo)) {
                    Storage::delete($user->photo);
                }
            }
            $path = $request->file('photo')->store('student');

        }
         $edit =  $user->update([
            'photo' => $path ?? $user->photo,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'patronymic' => $request->patronymic,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password ?? $user->password,
            'comment' => $request->comment,
            'title' => $request->title,
            'comming' => $request->comming,
            'phone_2' => $request->phone_2,
            'phone_3' => $request->phone_3,
            'position' => $request->position,
            'address' => $request->address,
            'age' => $request->age,
            'active' => $request->active ?? 0,
            'status' => $request->status ?? 0,
        ]);
        return redirect()->route('student.show' , ['student' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->photo ===  'img.png'){
            $user->delete();
        }else{
            if (isset($user->photo)){
                Storage::delete($user->photo);
            }
            $user->delete();

        }

        return redirect()->back();
    }
}
