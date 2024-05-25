<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Function\Helper;
use App\Http\Requests\ProjectRequest;

use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();

        if(array_key_exists('image', $form_data)){
            $image_path = Storage::put('uploads', $form_data['image']);

            $original_name = $request->file('image')->getClientOriginalName();

            $form_data['image'] = $image_path;
            $form_data['image_original_name'] = $original_name;
        }

        $form_data['slug'] = Helper::generateSlug($form_data['title'], Project::class);

        $new = new Project();
        $new->fill($form_data);
        $new->save();

        return redirect()->route('admin.projects.show', $new);
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
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        if($form_data['title'] != $project->title){
            $form_data['slug'] = Helper::generateSlug($form_data['title'], Project::class);
        }else{
            $form_data['slug'] = $project->title;
        }

        if(array_key_exists('image', $form_data)){
            $image_path = Storage::put('uploads', $form_data['image']);

            $original_name = $request->file('image')->getClientOriginalName();

            $form_data['image'] = $image_path;
            $form_data['image_original_name'] = $original_name;
        }

        $project->update($form_data);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('delete', $project->title . ' has been delete.');
    }
}
