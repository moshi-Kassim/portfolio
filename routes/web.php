<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Dashboard\ProjectController;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects');
Route::post('/projects/{project}/view', [FrontendController::class, 'trackView'])->name('projects.view');
Route::post('/projects/{project}/interest', [FrontendController::class, 'storeInterest'])->name('projects.interest');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard/projects', [ProjectController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/interests', [ProjectController::class, 'interests'])->name('dashboard.interests');
    Route::post('/dashboard/projects', [ProjectController::class, 'store']);
    Route::post('/dashboard/videos', [ProjectController::class, 'storeVideo'])->name('dashboard.videos.store');
    Route::patch('/dashboard/projects/{project}', [ProjectController::class, 'update']);
    Route::delete('/dashboard/projects/{project}', [ProjectController::class, 'destroy']);
});


require __DIR__.'/auth.php';