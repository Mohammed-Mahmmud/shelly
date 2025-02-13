<?php

namespace App\Actions\Solutions;

use App\Helper\ImageHelper;
use App\Models\Solution;

class StoreSolutionAction
{
    use ImageHelper;
    public function handle(array $data)
    {
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
                foreach ($content['media'] as $key => $image) {
                    $this->StoreImage($image, $solution, $content['title_en'] . '-' . $key);
                }
            }
            $solution->types()->attach($content['types']);
        }
        $solution->categories()->attach($data['categories']);
        toastr('data has been saved', 'success', 'success');
        return redirect()->back();
    }
}
