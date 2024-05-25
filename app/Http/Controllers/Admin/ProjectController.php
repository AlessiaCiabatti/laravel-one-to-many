<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Function\Helper;
use App\Http\Requests\ProjectRequest;
use App\Models\Technology;

use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(isset($_GET['toSearch'])){
            $projects = Project::where('title', 'LIKE', '%' . $_GET['toSearch'] . '%')->paginate(15);
            $count_search = Project::where('title', 'LIKE', '%' . $_GET['toSearch'] . '%')->count();
        }else{
            $projects = Project::orderBy('id', 'desc')->paginate(15);
            $count_search = Project::count();
        }

        $direction = 'desc';

        return view('admin.projects.index', compact('projects', 'count_search', 'direction'));
        }

    public function orderBy($direction, $column)
    {
        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $projects = Project::orderBy($column, $direction)->paginate();
        $count_search = Project::count();
        return view('admin.projects.index', compact('projects', 'count_search', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        return view('admin.projects.create', compact('technologies'));
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
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'technologies'));
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

        if($project->image){
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('delete', $project->title . ' has been delete.');
    }
}
