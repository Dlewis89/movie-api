<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMovieRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string|sometimes',
            'release_year' => 'integer|min:1900|sometimes|max:' . date("Y"),
            'rating' => [Rule::in(['G', 'PG', 'PG-13', 'R']), 'sometimes']
        ];
    }
}
