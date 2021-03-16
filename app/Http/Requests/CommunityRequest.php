<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommunityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => ['required', 'max:1000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:4096']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "This field is required.",
            'description.required' => "This field is required.",
            'description.max' => "Maximum field character is 1000.",
            'image.max' => "Maximum file size to upload is 4MB (4096 KB). If you are uploading a photo, try to reduce its resolution to make it under 4MB",
            'image.image' => "Unsupported file type.",
            'image.mimes' => "Unsupported file type."
        ];
    }
}
