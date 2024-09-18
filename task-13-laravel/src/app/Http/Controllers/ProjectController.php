<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function project($userId)
    {
        $projects = Project::where('user_id', $userId)->get();
        return response()->json($projects);
    }
}
