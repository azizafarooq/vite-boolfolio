<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(8);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *  
     */
    public function create()
    {
        $project = new Project;
        $types = Type::all();
        $technologies = Technology::orderBy('label')->get();
        return view('admin.projects.create', compact('project', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate(
            [//fai validazione del project e type
                'technologies' => 'nullable|exists:technologies,id',
            ],
            [
                'technologies.exists' => 'The technology in invalid',
            ]
        );

        $data = $request->all();
        $img_path = Storage::put('uploads/projects', $data["image"]);
        $project = new Project;
        $project->image = $img_path;
        $project->fill($data);
        $project->save();
        if (Arr::exists($data, "technologies"))
            $project->technologies()->attach($data["technologies"]);

        return redirect()->route('admin.projects.show', $project);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     */
    public function show(project $project)
    {
        $types = Type::all();
        return view('admin.projects.show', compact('project', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     */
    public function edit(project $project)
    {
        $types = Type::all();
        $technologies = Technology::orderBy('label')->get();
        $project_technologies = $project->technologies->pluck('id')->toArray();
        return view('admin.projects.edit', compact('project', 'types', 'technologies', 'project_technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     */
    public function update(Request $request, project $project)
    {
        $types = Type::all();
        $data = $request->all();
        $project->update($data);

        if (Arr::exists($data, "technologies"))
            $project->technologies()->sync($data["technologies"]);
        else
            $project->technologies()->detach();
        return redirect()->route('admin.projects.show', compact('project', 'types'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     */
    public function destroy(project $project)
    {
        $project->delete();
        $project->technologies()->detach();
        return redirect()->route('admin.projects.index');
    }
}
