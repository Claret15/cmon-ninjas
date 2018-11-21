<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFormRequest extends FormRequest
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
        $this->sanitize();
        return [
            'event_name' => 'required',
            'event_type' => 'required|min:1',
            'event_date' => 'required',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['event_name'] = filter_var($input['event_name'], FILTER_SANITIZE_STRING);
        $input['event_type'] = filter_var($input['event_type'], FILTER_SANITIZE_NUMBER_INT);
        // $input['event_date'] = filter_var($input['name'], FILTER_SANITIZE_STRING);

        $this->replace($input);
    }
}
