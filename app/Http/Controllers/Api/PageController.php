<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id')->with('technologies', 'type')->get();

        $success = true;
        return response()->json(compact('success', 'projects'));
    }

    public function types()
    {
        $types = Type::orderBy('id')->get();

        $success = true;
        return response()->json(compact('success', 'types'));
    }

    public function technologies()
    {
        $technologies = Technology::orderBy('id')->get();

        $success = true;
        return response()->json(compact('success', 'technologies'));
    }

    public function projectBySlug($slug)
    {
        $project = Project::where('slug', $slug)->with('technologies', 'type')->first();

        if ($project) {
            $success = true;
            if ($project->img_path) {
                $project->img_path = asset('storage/' . $project->img_path);
            } else {
                $project->img_path = 'img/no-img.jpg';
                $project->img_name = 'no-img';
            };
        } else {
            $success = false;
        }

        return response()->json(compact('success', 'project'));
    }
}
