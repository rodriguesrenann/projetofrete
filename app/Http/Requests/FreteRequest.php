<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FreteRequest extends FormRequest
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
            'product' => 'required',
            'address' => 'required',
            'date' => 'required',
            'time' => 'nullable',
            'status' => 'required',
            'value' => 'nullable',
            'obs' => 'nullable',
            'out' => 'required',
            'store' => 'required',
            'pay_machine' => 'nullable'
        ];
    }
}
