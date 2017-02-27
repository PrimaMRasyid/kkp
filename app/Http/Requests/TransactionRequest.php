<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'nama_umum' => 'isProhibited:' . $this->input('nama_umum')
        ];
    }

    public function messages()
    {
        return [
            'nama_umum.is_prohibited' => 'Ikan yang anda masukan dalam kategori terlarang'
        ];
    }
}
