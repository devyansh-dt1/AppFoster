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
















// public function index()
//     {
//         $users = User::all();
//         return view("users.list", ["users" => $users]);
//     }

// public function store(Request $request){
//          $rules=[
//                 'name'=> 'required|min:3',
//                 'username'=> 'required|min:3',
//                 'email'=> 'required|email',

//             ];
//              $validator= Validator::make($request->all(), $rules);

//              if($validator->fails()){
//                 return redirect()->route('users.create')->withErrors( $validator );
//              }

//              // insert in db
//              $user = new User();
//              $user->name = $request->name;
//              $user->username = $request->username;
//              $user->phone = $request->phone;
//              $user->email = $request->email;
//              $user->website = $request->website;
//              $user->companyname = $request->companyname;
//              $user->save();

//              return redirect()->route('users.index')->with('success','User added successfully');
// }




//     public function edit($id)
//     {
//         $user = User::findOrFail($id);
//         return view('users.edit', [
//             'user' => $user
//         ]);
//     }



// public function update($id,Request $request){

//         $user= User::findOrFail($id);


//         $rules=[
//             'name'=> 'required|min:3',
//             'username'=> 'required|min:3',
//             'email'=> 'required|email',

//         ];
//          $validator= Validator::make($request->all(), $rules);

//          if($validator->fails()){
//             return redirect()->route('users.edit', $user->id)->withErrors( $validator );
//          }

        
//          $user->name = $request->name;
//          $user->username = $request->username;
//          $user->phone = $request->phone;
//          $user->email = $request->email;
//          $user->website = $request->website;
//          $user->companyname = $request->companyname;
//          $user->save();

//          return redirect()->route('users.index')->with('success','User Updated successfully');

//     }



//     public function delete($id){
//         $user= User::findOrFail($id);

//         $user->delete();
//         return redirect()->route('users.index')->with('success','User Deleted successfully');
//     }
