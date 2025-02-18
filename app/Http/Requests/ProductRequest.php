<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ProductRequest extends FormRequest
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
            'title_en' => 'required|max:255|string',
            'title_ar' => 'required|max:255|string',
            'desc_en' =>  'nullable|string|max:2048',
            'desc_ar' =>  'nullable|string|max:2048',
            'stock' => 'nullable|string|max:300',
            'long_desc_en' => 'nullable|string|max:2048',
            'long_desc_ar' => 'nullable|string|max:2048',
            'price' => 'nullable|numeric',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'snippet_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' =>  'required',
            'articles' =>  'required',
            'types' => ['required', 'array'],
            'categories' => ['required', 'array'],
            'technologies' => ['required', 'array'],
            'productUsings' => ['required', 'array'],
            'types.*' => ['required', 'string'],
            'categories.*' => ['required', 'string'],
            'technologies.*' => ['required', 'string'],
            'productUsings.*' => ['required', 'string'],



        ]);
    }
    public function validationUpdate()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title_en' => 'required|max:255|string',
            'title_ar' => 'required|max:255|string',
            'desc_en' =>  'nullable|string|max:2048',
            'desc_ar' =>  'nullable|string|max:2048',
            'stock' => 'nullable|string|max:300',
            'long_desc_en' => 'nullable|string|max:2048',
            'long_desc_ar' => 'nullable|string|max:2048',
            'price' => 'nullable|numeric',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'snippet_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' =>  'required',
            'articles' =>  'required',
            'types' => ['required', 'array'],
            'categories' => ['required', 'array'],
            'technologies' => ['required', 'array'],
            'productUsings' => ['required', 'array'],
            'types.*' => ['required', 'string'],
            'categories.*' => ['required', 'string'],
            'technologies.*' => ['required', 'string'],
            'productUsings.*' => ['required', 'string'],


        ]);
    }
}
