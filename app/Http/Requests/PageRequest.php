<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
    public function validationStore()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'slug' => 'required|string',
            'status' => 'required|string',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10960',
            'parent_id' => 'nullable|numeric'


        ]);
    }
    public function validationUpdate()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'slug' => 'required|string',
            'status' => 'required|string',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10960',
            'parent_id' => 'nullable|numeric'
        ]);
    }
}
