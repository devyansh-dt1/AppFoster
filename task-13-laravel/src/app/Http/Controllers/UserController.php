<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    function list(){
        return User::all();
    }

    // function addUsers(){
    //     return "add student";
    // }
}
