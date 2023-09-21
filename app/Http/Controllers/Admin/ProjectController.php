<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Controllers\Controller;

//Models
use App\Models\Project;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();

        $project = Project::create([

            'title' => $formData['title'],
            'slug' => str()->slug($formData['title']),
            'content' =>$formData['content'],
            'type_id' =>$formData['type_id']
        ]);

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {   
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();

        $project->update([

            'title' => $formData['title'],
            'slug' => str()->slug($formData['title']),
            'content' =>$formData['content'],
            'type_id' =>$formData['type_id']
        ]);

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}