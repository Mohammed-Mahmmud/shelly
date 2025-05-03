<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class SolutionRequest extends FormRequest
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
            'media.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' =>  'required',
            'slug' =>  'required',
            'types' =>  'required',
            'pages' =>  'required',
        ]);
    }
    public function validationUpdate()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'media.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title_en' =>  'required|string |max:255',
            'title_ar' =>  'required|string |max:255',
            'desc_en' =>  'required|string',
            'desc_ar' =>  'required|string',
            'slug' =>  'required',
            'types' =>  'required',
            'pages' =>  'required',
        ]);
    }
}
