<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if ($this->route('id')) {
            return [
                //
                'title' => 'required|min:3|max:20',
                'body' => 'required|min:10|max:1000',
                'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            ];
        } else {
            return [
                //
                'title' => 'required|unique:posts|min:3|max:20',
                'body' => 'required|min:10|max:1000',
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ];
        }
    }
}
