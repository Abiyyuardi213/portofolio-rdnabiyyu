<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('image/projects');

            if (! is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);
            $data['image'] = 'image/projects/' . $filename;
        }

        Project::create($data);
        return redirect()->route('projects.index')->with('success', 'Project added successfully');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($project->image && file_exists(public_path($project->image))) {
                @unlink(public_path($project->image));
            }

            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('image/projects');

            if (! is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);
            $data['image'] = 'image/projects/' . $filename;
        } else {
            $data['image'] = $project->image;
        }

        $project->update($data);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
