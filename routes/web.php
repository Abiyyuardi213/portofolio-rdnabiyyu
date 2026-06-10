<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

// Front-end Routes
Route::get('/', function () {
    $profile = Profile::with('photos')->first();
    return view('about', compact('profile'));
});

Route::get('/experience', function () {
    $experiences = Experience::all();
    return view('experience', compact('experiences'));
});

Route::get('/portfolio', function () {
    $projects = Project::all();
    return view('portfolio', compact('projects'));
});

Route::get('/skills', function () {
    $skills = Skill::all();
    return view('skills', compact('skills'));
});

Route::get('/education', function () {
    $educations = Education::all();
    return view('education', compact('educations'));
});

Route::post('/kirim-saran', function () {
    return back()->with('success', 'Saran Anda telah terkirim!');
});

// Auth Routes
Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');
    
    if (Illuminate\Support\Facades\Auth::attempt($credentials)) {
        return redirect()->intended('/admin/dashboard')->with('success', 'Login berhasil. Selamat datang kembali!');
    }
    
    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
});

// Admin Routes (Grouped)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('profile', ProfileController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('education', EducationController::class);

    Route::post('/logout', function () {
        Illuminate\Support\Facades\Auth::logout();
        return redirect('/login')->with('success', 'Logout berhasil. Sampai jumpa lagi!');
    })->name('logout');
});
