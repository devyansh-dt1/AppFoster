<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function projects($userId)
    {
        $projects = Project::where('userId', $userId)->get();
        return response()->json($projects);
    }
}
