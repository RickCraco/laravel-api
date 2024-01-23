<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all()->load(['category', 'technologies']);
        return response()->json($projects);
    }

    

    public function show(Project $project)
    {
        //$project = Project::where('id', $project->id)->with(['category', 'technologies'])->get();
        return response()->json($project->load(['category', 'technologies']));
    }

    public function search(Request $request)
    {
        $projects = Project::where('title', 'like', '%' . $request->query('search') . '%')->get();
        return response()->json($projects->load(['category', 'technologies']));
    }

    /*
    public function searchByCategory(Request $request)
    {
        $projects = Project::whereHas('category', function($query) use ($request){
            $query->where('name', 'like', '%' . $request->query('categories') . '%');
        })->get();
        return response()->json($projects);
    }
    */
}
