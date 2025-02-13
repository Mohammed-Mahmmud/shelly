<?php

namespace App\Actions\Projects;

use App\Helper\ImageHelper;
use App\Models\Project;
use App\Models\Solution;

class StoreProjectAction
{
    use ImageHelper;
    public function handle(array $data)
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
        Project::create($formatteddata);
        toastr('data has been saved', 'success', 'success');
        return redirect()->back();
    }
}
