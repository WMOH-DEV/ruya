<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role_id == 4;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'                 => ['required', 'string', 'max:200'],
            'price'                 => ['required', 'string'],
            'duration'              => ['required', 'string'],
            'instructor'            => ['required', 'string', 'max:200'],
            'about_instructor'      => ['required', 'string', 'max:250'],
            'how'                   => ['required', 'string'],
            'lectures'              => ['nullable', 'numeric'],
            'language'              => ['nullable', 'string', 'max:200'],
            'intro_video'           => ['nullable', 'string', 'max:200'],
            'intro_image'           => ['nullable', 'image'],
            'intro_text'            => ['required', 'string'],
            'content'               => ['required', 'string'],
            'for_who'               => ['nullable', 'string'],
            'requirements'          => ['nullable', 'string', 'max:250'],
            'category_id'           => ['required', 'numeric'],
        ];
    }
}
