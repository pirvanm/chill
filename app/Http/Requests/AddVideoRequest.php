<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddVideoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'video' => 'required|string',
            'category' => 'nullable|array',
            'category.id' => 'nullable|integer',
            'subcategories' => 'nullable|array',
        ];
    }
}
