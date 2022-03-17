<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Interfaces\ProjectRepositoryInterface;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    protected $projectR ;
    public function __construct(ProjectRepositoryInterface $project)
    {
        $this->projectR = $project;
        $this->middleware('auth');
    }

    public function index()
    {
        //$projects = project::orderby('id','asc')->paginate(); before Repo
        return view('project.index',['projects' => $this->projectR->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new project;
        $fields = $request->all();
        $this->projectR->create($fields);

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project.show', ['project' => $this->projectR->find($project->id)]);
            
        // return view('project.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit', ['project' => $this->projectR->find($project->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // before repo

        $request->validate([
            'f_name' => 'required',
            // 'age' => 'required',
            'email' => 'required',
            'as_date' => 'required',
            'deadline' => 'required',

        ]);

        // $contact = new contact;
        // $contact = contact::find($contact->id);
        // $contact->f_name = $request->f_name;
        // $contact->email = $request->email;
        // $contact->save();

       
        $this->projectR->update($project->id,$request);
        return redirect()->route('project.index')->with('Success','Details has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->projectR->delete($project->id);
        return redirect()->route('project.index')->with('Success','Details has been deleted successfully');
    
    }
}