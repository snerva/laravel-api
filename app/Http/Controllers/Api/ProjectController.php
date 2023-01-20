<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'results' => Project::with(['type', 'technologies'])->orderByDesc('id')->paginate(6)
        ]);
    }

    public function show($slug)
    {
        //dd($slug);
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Project not found',
            ]);
        }
    }
}
