<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'role' => 'required',
            'period' => 'required',
        ]);

        $data = $request->all();
        
        // Convert description string to json if multiple lines
        if ($request->description) {
            $descArray = explode("\n", str_replace("\r", "", $request->description));
            $data['description'] = json_encode(array_filter($descArray));
        }

        Experience::create($data);

        return redirect()->route('experiences.index')->with('success', 'Experience added successfully');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'company' => 'required',
            'role' => 'required',
            'period' => 'required',
        ]);

        $data = $request->all();
        
        if ($request->description) {
            $descArray = explode("\n", str_replace("\r", "", $request->description));
            $data['description'] = json_encode(array_filter($descArray));
        }

        $experience->update($data);

        return redirect()->route('experiences.index')->with('success', 'Experience updated successfully');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience deleted successfully');
    }
}
