<?php

namespace App\Repositories;
use App\Models\Project;
use App\Interfaces\ProjectRepositoryInterface;


    class ProjectRepository implements ProjectRepositoryInterface
    {
        public function all()
        {
            $project = Project::all();
            return $project;
        }

        public function create($data)
        {
            Project::create($data);
        }

        public function find($id) 
        {
            $project = Project::find($id);
            return $project;
        }

        public function update($id, $data)
        {
            $input = $data->all();
            $project = Project::find($id);
            $project->fill($input)->save();
        }

        public function delete($id)
        {
            return Project::find($id)->delete();
        }
        
    }
?>