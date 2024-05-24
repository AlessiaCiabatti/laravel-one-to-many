<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'text' => 'required|min:10',
        ];
    }

    public function messages(){
        return[
            'title.required' => 'Title is a required field',
            'title.min' => 'Title needs :min characters',
            'title.max' => 'Title can\'t has more :min characters',

            'text.required' => 'Description is a required field',
            'text.min' => 'Description needs :min characters',
        ];
    }
}
