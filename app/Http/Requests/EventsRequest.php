<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EventsRequest
 * @package App\Http\Requests
 * @author Stephen Dueñas <semduenas@gmail.com>
 * @since 11/19/2020 7:26 AM
 */
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
            'start_date' => ['required', 'date', 'before_or_equal:end_date'],
            'end_date'   => ['required', 'date', 'after_or_equal:start_date'],
            'day.*'      => ['required', 'integer', 'min:0', 'max:6']
        ];
    }
}
