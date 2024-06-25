<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use App\Models\Course;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group = Group::all();
        return view('crm.connection.index', [
            'groups' => $group
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        /*
         * If you want to show only the users who are members of the current group in the index method of your ConnectionController, you can retrieve and display only those users who are connected to the group specified in the current context. Here's how you can do that:
         * */
        $groupId = $request->input('id');
        $group = Group::find($groupId);

        // Check if the group exists
        if (!$group) {
            return redirect()->route('some_error_route');
        }

        // Get the IDs of users already connected to the current group
        $connectedUserIds = $group->connections->pluck('user_id')->toArray();

        // Query users who are not already connected to the current group
        $users = User::whereNotIn('id', $connectedUserIds)->get();

        return view('crm.connection.create', [
            'group' => $group,
            'users' => $users
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
            'users' => 'required',
            ]);
        $group_id = $request->input('group_id');
        $user_ids = $request->input('users');

        foreach ($user_ids as $user_id) {
            Connection::create([
                'group_id' => $group_id,
                'user_id' => $user_id,
                'status' => $request->input('status', 0)
            ]);
        }

        return redirect()->route('connection');
    }
    /*
     *
     * */

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the group based on the provided ID
        $group = Group::find($id);


        // Check if the group exists
        if (!$group) {
            return redirect()->route('connection');
        }


        // Get the connected users for the current group
        $connectedUsers = $group->connectedUsers();


        return view('crm.connection.show', [
            'group' => $group,
            'connectedUsers' => $connectedUsers,

        ]);
    }
    public function destroyConnection($userId, $groupId)
    {
        // Find the connection based on user_id and group_id
        $connection = Connection::where('user_id', $userId)
            ->where('group_id', $groupId)
            ->first();

        // Check if the connection exists
        if (!$connection) {
            return redirect()->route('connection')->with('error', 'Connection not found');
        }

        // Delete the connection
        $connection->delete();

        return redirect()->route('connection.index')->with('success', 'Connection deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Connection $connection)
    {

    }

}
