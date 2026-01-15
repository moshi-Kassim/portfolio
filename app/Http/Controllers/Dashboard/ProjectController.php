<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Show the projects dashboard.
     */
    public function index()
    {
        // Fetch latest projects for the dashboard view
        $projects = Project::withCount('interests')->latest()->get();

        return view('dashboard.projects', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show recent interests in a separate page.
     */
    public function interests()
    {
        $recentInterests = Interest::with('project')->latest()->take(50)->get();

        return view('dashboard.interests', [
            'recentInterests' => $recentInterests,
        ]);
    }

    /**
     * Store a newly created project from the dashboard form.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // New: multiple images
            'images'     => ['nullable', 'array', 'min:1'],
            'images.*'   => ['image', 'max:4096'], // 4MB each
            'titles'     => ['nullable', 'array'],
            'titles.*'   => ['required', 'string', 'max:255'],
            'categories'   => ['nullable', 'array'],
            'categories.*' => ['nullable', 'string', 'max:255'],

            // Backward compatibility: old single input name="image"
            'image'      => ['nullable', 'image', 'max:4096'],

            // Backward compatibility fields for single upload
            'title'      => ['nullable', 'string', 'max:255'],
            'category'   => ['nullable', 'string', 'max:255'],
        ]);

        $files = [];
        if ($request->hasFile('images')) {
            $files = $request->file('images');
        } elseif ($request->hasFile('image')) {
            $files = [$request->file('image')];
        }

        if (count($files) === 0) {
            return redirect()->back()->withErrors([
                'images' => 'Please upload at least one image.',
            ])->withInput();
        }

        $titles = $request->input('titles', []);
        $categories = $request->input('categories', []);

        foreach ($files as $index => $file) {
            $path = $file->store('projects', 'public');

            $project           = new Project();
            // If multi-upload fields exist, use per-image values; otherwise fallback to single title/category.
            $project->title    = $titles[$index] ?? ($validated['title'] ?? $file->getClientOriginalName());
            $project->category = $categories[$index] ?? ($validated['category'] ?? null);
            $project->image    = $path;
            $project->save();
        }

        return redirect()->back()->with('status', 'Project(s) created successfully!');
    }

    /**
     * Store a new video project from the dashboard form.
     */
    public function storeVideo(Request $request)
    {
        $validated = $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'video'    => ['required', 'file', 'mimetypes:video/mp4,video/quicktime,video/x-msvideo,video/webm', 'max:51200'], // ~50MB
        ]);

        $path = $request->file('video')->store('videos', 'public');

        $project = new Project();
        $project->title    = $validated['title'];
        $project->category = $validated['category'] ?? null;
        $project->video    = $path;
        $project->save();

        return redirect()->back()->with('status', 'Video project created successfully!');
    }

    /**
     * Update an existing project (rename / change category / replace image).
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'image'    => ['nullable', 'image', 'max:4096'], // 4MB
        ]);

        $project->title    = $validated['title'];
        $project->category = $validated['category'] ?? null;

        if ($request->hasFile('image')) {
            // delete old image if exists
            if (!empty($project->image) && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            $project->image = $request->file('image')->store('projects', 'public');
        }

        $project->save();

        return redirect()->back()->with('status', 'Project updated successfully!');
    }

    /**
     * Delete a project and its image.
     */
    public function destroy(Project $project)
    {
        if (!empty($project->image) && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->back()->with('status', 'Project deleted successfully!');
    }
}