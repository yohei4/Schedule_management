<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'user_id' => 'required',
            'title' => 'required | max:30',
            'place' => 'required | max:15',
            'checkbox' => 'required',
            'start' => 'required',
            'start_time' => 'required',
            'end' => 'required',
            'end_time' => 'required',
        ];
    }
}
