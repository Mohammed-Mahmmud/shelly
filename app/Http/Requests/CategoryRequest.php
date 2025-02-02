<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CategoryRequest extends FormRequest
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
            'icon' => 'required|string',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:20480',

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
            'icon' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);
    }
}
