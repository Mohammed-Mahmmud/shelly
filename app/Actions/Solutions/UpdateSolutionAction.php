<?php

namespace App\Actions\Solutions;

use App\Models\Solution;
use App\Helper\ImageHelper;

class UpdateSolutionAction
{
    use ImageHelper;

    public function handle(Solution $solution, array $data)
    {
        $formattedData = [
            "title" => [
                "en" => $data['title_en'],
                "ar" => $data['title_ar']
            ],
            "desc" => [
                "en" => $data['desc_en'],
                "ar" => $data['desc_ar']
            ],
            'slug' => $data['slug']
        ];
        $solution->update($formattedData);
        if (isset($data['media'])) {
            $this->UpdateImages($data['media'], $solution, 'solution');
        }
        $solution->types()->sync($data['types']);
        $solution->pages()->sync($data['pages']);

        toastr('data has been updated', 'info', 'success');
        return redirect()->back();
    }
}
