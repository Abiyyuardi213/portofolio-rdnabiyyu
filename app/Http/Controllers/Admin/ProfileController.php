<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::with('photos')->first();
        return view('admin.profile.index', compact('profile'));
    }

    public function create()
    {
        if ($profile = Profile::first()) {
            return redirect()->route('profile.edit', $profile->id);
        }

        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        if (Profile::exists()) {
            return redirect()->route('profile.index')->with('error', 'Profile already exists. Please edit the existing profile.');
        }

        $profile = Profile::create($this->profileData($request));
        $this->uploadGalleryPhotos($request, $profile);

        return redirect()->route('profile.index')->with('success', 'Profile added successfully');
    }

    public function show(Profile $profile)
    {
        return redirect()->route('profile.index');
    }

    public function edit(Profile $profile)
    {
        $profile->load('photos');

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $profile->update($this->profileData($request, $profile));
        $this->uploadGalleryPhotos($request, $profile);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => 'required',
            'role' => 'required',
            'bio' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'cropped_photos' => 'nullable|array',
            'cropped_photos.*' => 'nullable|string',
            'cropped_photo' => 'nullable|string',
            'phone' => 'nullable',
            'whatsapp' => 'nullable',
            'email' => 'nullable|email',
            'location' => 'nullable',
            'github' => 'nullable',
            'linkedin' => 'nullable',
            'instagram' => 'nullable',
        ]);
    }

    private function profileData(Request $request, ?Profile $profile = null): array
    {
        $this->validatedData($request);

        $data = $request->only([
            'name',
            'role',
            'bio',
            'phone',
            'whatsapp',
            'email',
            'location',
            'github',
            'linkedin',
            'instagram',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->filled('cropped_photo')
                ? $this->uploadCroppedPhoto($request)
                : $this->uploadPhoto($request);
        } elseif ($profile) {
            $data['photo'] = $profile->photo;
        }

        return $data;
    }

    private function uploadPhoto(Request $request): string
    {
        $file = $request->file('photo');
        $filename = Str::slug($request->name) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $destination = public_path('image/profiles');

        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        return 'image/profiles/' . $filename;
    }

    private function uploadGalleryPhotos(Request $request, Profile $profile): void
    {
        if (! $request->hasFile('photos')) {
            return;
        }

        $destination = public_path('image/profiles');

        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        foreach ($request->file('photos') as $index => $file) {
            if (! $file) {
                continue;
            }

            $cropped = $request->input("cropped_photos.$index");

            if ($cropped && preg_match('/^data:image\/(png|jpeg|jpg|webp);base64,/', $cropped, $matches)) {
                $extension = $matches[1] === 'jpeg' ? 'jpg' : $matches[1];
                $filename = Str::slug($request->name) . '-gallery-cropped-' . time() . '-' . $index . '.' . $extension;
                $data = base64_decode(substr($cropped, strpos($cropped, ',') + 1));
                file_put_contents($destination . DIRECTORY_SEPARATOR . $filename, $data);
            } else {
                $filename = Str::slug($request->name) . '-gallery-' . time() . '-' . $index . '.' . $file->getClientOriginalExtension();
                $file->move($destination, $filename);
            }

            $profile->photos()->create([
                'path' => 'image/profiles/' . $filename,
            ]);
        }
    }

    private function uploadCroppedPhoto(Request $request): string
    {
        $image = $request->input('cropped_photo');

        if (! preg_match('/^data:image\/(png|jpeg|jpg|webp);base64,/', $image, $matches)) {
            return $this->uploadPhoto($request);
        }

        $extension = $matches[1] === 'jpeg' ? 'jpg' : $matches[1];
        $data = base64_decode(substr($image, strpos($image, ',') + 1));
        $filename = Str::slug($request->name) . '-cropped-' . time() . '.' . $extension;
        $destination = public_path('image/profiles');

        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        file_put_contents($destination . DIRECTORY_SEPARATOR . $filename, $data);

        return 'image/profiles/' . $filename;
    }
}
