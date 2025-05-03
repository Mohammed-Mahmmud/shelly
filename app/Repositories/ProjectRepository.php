<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function find($id)
    {
        return Project::findOrFail($id);
    }

    public function all()
    {
        return Project::orderBy('id', 'desc')->get();
    }

    public function create(array $data)
    {
        $formatteddata = [
            "title" => [
                "en" => $data['title_en'],
                "ar" => $data['title_ar']
            ],
            "desc" => [
                "en" => $data['desc_en'],
                "ar" => $data['desc_ar']
            ],
            'status' => $data['status'],
            'slug' => $data['slug'],
            'page_id' => $data['page_id'],
        ];
        return Project::create($formatteddata);
    }
    public function edit(Project $project, array $data)
    {
        $formatteddata = [
            "title" => [
                "en" => $data['title_en'],
                "ar" => $data['title_ar']
            ],
            "desc" => [
                "en" => $data['desc_en'],
                "ar" => $data['desc_ar']
            ],
            'status' => $data['status'],
            'slug' => $data['slug'],
            'page_id' => $data['page_id'],
        ];

        $project->update($formatteddata);
        return $project;
    }
}
