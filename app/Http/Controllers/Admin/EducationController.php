<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index() { 
        $education = Education::all(); return view('admin.education.index', compact('education')); 
    }

    public function create() { 
        return view('admin.education.create'); 
    }

    public function store(Request $request) { 
        $request->validate(['institution' => 'required', 'degree' => 'required', 'period' => 'required']);
        $data = $request->all();
        if ($request->achievements) {
            $achArray = explode("\n", str_replace("\r", "", $request->achievements));
            $data['achievements'] = json_encode(array_filter($achArray));
        }
        Education::create($data);
        return redirect()->route('education.index')->with('success', 'Education added successfully');
    }

    public function edit(Education $education) { 
        return view('admin.education.edit', compact('education')); 
    }

    public function update(Request $request, Education $education) {
        $request->validate(['institution' => 'required', 'degree' => 'required', 'period' => 'required']);
        $data = $request->all();
        if ($request->achievements) {
            $achArray = explode("\n", str_replace("\r", "", $request->achievements));
            $data['achievements'] = json_encode(array_filter($achArray));
        }
        $education->update($data);
        return redirect()->route('education.index')->with('success', 'Education updated successfully');
    }
    public function destroy(Education $education) { 
        $education->delete(); return redirect()->route('education.index')->with('success', 'Education deleted successfully'); 
    }
}
