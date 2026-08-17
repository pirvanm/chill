<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddChannelVideosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'channel' => 'required|string',
            'token' => 'nullable|string',
            'category' => 'nullable|array',
            'category.id' => 'nullable|integer',
            'subcategories' => 'nullable|array',
        ];
    }
}
