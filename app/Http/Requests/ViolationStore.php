<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViolationStore extends FormRequest
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
            'violator_identity_number' => 'required',
            'violator_name' => 'required',
            'station_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'violator_identity_number.required' => 'Nomor Identitas Pelanggar masih kosong.'
        ];
    }
}
