<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Project;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }
    public function create()
    {
        return view("users.create");
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'username' => 'required|min:3',
            'email' => 'required|email|unique:users'
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {  
        // \Log::info($request);

        $request->validate([
            'name' => 'required',
            'username' => 'required|min:3',
            'email' => 'required|email|unique:users'
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }



    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted successfully');
    }
}