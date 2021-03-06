<?php

namespace App\Http\Requests\Logistik;

use Illuminate\Foundation\Http\FormRequest;

class SuplierRequest extends FormRequest
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
            'nama'       => 'required',
            'alamat'     => 'required',
            'no_telepon' => 'required',
        ];
    }
}
