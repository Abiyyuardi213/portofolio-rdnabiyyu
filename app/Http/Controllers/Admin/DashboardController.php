<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'experiences' => Experience::count(),
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'education' => Education::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
