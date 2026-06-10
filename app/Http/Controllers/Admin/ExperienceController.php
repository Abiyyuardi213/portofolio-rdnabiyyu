<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'role' => 'required',
            'period' => 'required',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cropped_logo' => 'nullable|string',
        ]);

        $data = $request->only(['company', 'role', 'period', 'description']);

        if ($request->filled('cropped_logo')) {
            $data['logo'] = $this->uploadCroppedLogo($request);
        } elseif ($request->hasFile('logo')) {
            $data['logo'] = $this->uploadLogo($request);
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
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cropped_logo' => 'nullable|string',
        ]);

        $data = $request->only(['company', 'role', 'period', 'description']);

        if ($request->filled('cropped_logo')) {
            $data['logo'] = $this->uploadCroppedLogo($request);
        } elseif ($request->hasFile('logo')) {
            $data['logo'] = $this->uploadLogo($request);
        }

        $experience->update($data);

        return redirect()->route('experiences.index')->with('success', 'Experience updated successfully');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience deleted successfully');
    }

    private function uploadLogo(Request $request): string
    {
        $file = $request->file('logo');
        $filename = Str::slug($request->company) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $destination = public_path('image/experiences');

        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        return 'image/experiences/' . $filename;
    }

    private function uploadCroppedLogo(Request $request): string
    {
        $image = $request->input('cropped_logo');

        if (! preg_match('/^data:image\/(png|jpeg|jpg|webp);base64,/', $image, $matches)) {
            return $this->uploadLogo($request);
        }

        $extension = $matches[1] === 'jpeg' ? 'jpg' : $matches[1];
        $data = base64_decode(substr($image, strpos($image, ',') + 1));
        $filename = Str::slug($request->company) . '-cropped-' . time() . '.' . $extension;
        $destination = public_path('image/experiences');

        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        file_put_contents($destination . DIRECTORY_SEPARATOR . $filename, $data);

        return 'image/experiences/' . $filename;
    }
}
