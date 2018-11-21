<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStatFormRequest extends FormRequest
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
            'guild_id' => 'required',
            'event_id' => 'required',
            'member_id' => 'required',
            'guild_pts' => 'required',
            'position' => 'required',
            'solo_pts' => 'required',
            'league_id' => 'required',
            'solo_rank' => 'required',
            'global_rank' => 'required',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['guild_id'] = filter_var($input['guild_id'], FILTER_SANITIZE_NUMBER_INT);
        $input['event_id'] = filter_var($input['event_id'], FILTER_SANITIZE_NUMBER_INT);
        $input['member_id'] = filter_var($input['member_id'], FILTER_SANITIZE_NUMBER_INT);
        $input['guild_pts'] = filter_var($input['guild_pts'], FILTER_SANITIZE_NUMBER_INT);
        $input['position'] = filter_var($input['position'], FILTER_SANITIZE_NUMBER_INT);
        $input['solo_pts'] = filter_var($input['solo_pts'], FILTER_SANITIZE_NUMBER_INT);
        $input['league_id'] = filter_var($input['league_id'], FILTER_SANITIZE_NUMBER_INT);
        $input['solo_rank'] = filter_var($input['solo_rank'], FILTER_SANITIZE_NUMBER_INT);
        $input['global_rank'] = filter_var($input['global_rank'], FILTER_SANITIZE_NUMBER_INT);

        $this->replace($input);
    }
}
