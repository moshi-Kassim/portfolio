<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Interest;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'projects' => Project::latest()->get()
        ]);
    }

    public function projects()
    {
        return view('frontend.projects', [
            'projects' => Project::latest()->get(),
        ]);
    }

    public function trackView(Project $project)
    {
        $project->increment('views');

        return response()->noContent();
    }

    public function storeInterest(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name'    => ['nullable', 'string', 'max:255'],
            'email'   => ['nullable', 'email', 'max:255'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $project->interests()->create($validated);

        return redirect()->back()->with('status', 'Thanks for your interest! I will get back to you soon.');
    }
}