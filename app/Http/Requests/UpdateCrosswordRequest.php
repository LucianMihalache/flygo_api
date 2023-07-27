<?php

namespace App\Http\Requests;

use App\Models\Source\Direction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCrosswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'answer' => ['nullable'],
            'clue' => ['nullable'],
            'date' => ['nullable', 'date_format:Y-m-d'],
            'direction' => ['nullable', Rule::in([Direction::Across->value, Direction::Down->value])],
        ];
    }
}
