<?php

namespace App\Http\Requests\Master\Wilayah;

use Illuminate\Foundation\Http\FormRequest;

class KelurahanRequest extends FormRequest
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
            'name'              => ['required', 'string', 'max:64'],
            'kecamatan_id'      => ['required', 'exists:kecamatans,id'],
            'kota_kabupaten_id' => ['required', 'exists:kota_kabupatens,id'],
            'provinsi_id'       => ['required', 'exists:provinsis,id']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'provinsi_id'       => 'provinsi',
            'kota_kabupaten_id' => 'kota/kabupaten',
            'kecamatan_id'      => 'kecamatan',
            'name'              => 'nama kelurahan',
        ];
    }
}
