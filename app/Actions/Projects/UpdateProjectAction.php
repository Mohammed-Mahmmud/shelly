<?php

namespace App\Actions\Projects;

use App\Models\Project;

class UpdateProjectAction
{
    public function handle(Project $project, array $data)
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
        ];

        $project->update($formatteddata);
        toastr('data has been updated', 'info', 'success');
        return redirect()->back();
    }
}
