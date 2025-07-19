<?php

namespace App\Actions\Solutions;

use App\Helper\ImageHelper;
use App\Models\Solution;

class StoreSolutionAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        //        dd($data);
        foreach ($data['content'] as $content) {
            $formattedcontent = [
                "title" => [
                    "en" => $content['title_en'],
                    "ar" => $content['title_ar']
                ],
                "desc" => [
                    "en" => $content['desc_en'],
                    "ar" => $content['desc_ar']
                ],
                'slug' => $data['slug']
            ];
            $solution = Solution::create($formattedcontent);
            if (isset($content['media'])) {
                $this->StoreImages($content['media'], $solution, 'solution');
            }
            $solution->types()->attach($content['types']);
            $solution->pages()->attach($data['pages']);
        }
        toastr('data has been saved', 'success', 'success');
        return redirect()->back();
    }
}
