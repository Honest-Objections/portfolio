<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Image;
use App\Models\Skill; 
use App\Models\Project; 
use App\Models\Portfolio; 


class ProjectController extends Controller
{
    public function index () 
    {
        $portfolio = Portfolio::find(1); 
        return view('project.index', $portfolio);
    }

    public function create () 
    {
        $skills = Skill::all(); 

        return view('project.form', [
            'project' => null,
            'skills' => $skills
        ]);
    }

    public function store (Request $request) 
    {
        $validated = $request->validate([
            'portfolio' => 'required',
            'name' => 'required|max:255',
            'description' => 'required',
            'skills' => 'min:1',
            'photos' => 'min:1'
        ]);

        $portfolio = Portfolio::find($validated['portfolio']); 
        $project = new Project([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);
        
        $project = $portfolio->projects()->save($project);
        $project->skills()->attach($validated['skills']); 
        foreach ($request->file('photos') as $i => $file) 
        {
            if ($file->isValid()) {
                $path = $file->store("images/projects/{$project->id}", 'public'); 
                $photo = new Image([
                    'src' => asset('storage/' . $path),
                    'disk' => 'public',
                    'relativePath' => $path,
                    'originalName' => $file->getClientOriginalName()
                ]); 

                $project->photos()->save($photo); 
                if ($i == 0) $project->setBackgroundImage($photo); 
            } 
        }
        return view('project.index', $portfolio);
    }

    public function edit ($id) 
    {
        $project = Project::find($id); 
        $skills = Skill::all(); 

        return view('project.form', [
            'project' => $project,
            'skills' => $skills
        ]);
    }

    public function update (Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'skills' => 'min:1',
        ]);

        $project = Project::find($id);
        $project->update([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);
        $project->skills()->sync($validated['skills']); 

        foreach ($request->file('photos') as $i => $file) 
        {
            if ($file->isValid()) {
                $path = $file->store("images/projects/{$project->id}", 'public'); 
                $photo = new Image([
                    'src' => asset('storage/' . $path),
                    'disk' => 'public',
                    'relativePath' => $path,
                    'originalName' => $file->getClientOriginalName()
                ]); 

                $project->photos()->save($photo); 
            } 
        }

        return redirect('/');
    }

}