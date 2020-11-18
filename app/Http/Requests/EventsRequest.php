<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsRequest extends FormRequest
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
            'event_name' => ['required', 'min:1', 'max:100'],
            'start_date' => ['required', 'date'],
            'end_date'   => ['required', 'date'],
            'day.*'      => ['required', 'integer', 'min:0', 'max:6']
        ];
    }
}
