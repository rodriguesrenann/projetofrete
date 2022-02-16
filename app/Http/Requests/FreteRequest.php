<?php

namespace App\Http\Requests;

use App\Rules\Pago;
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
            'produto' => 'required',
            'endereco_entrega' => 'required',
            'dia_frete' => 'required',
            'horario_frete' => 'nullable',
            'nome_numero'=> 'required',
            'status_frete' => [new Pago],
            'valor_frete' => 'nullable',
            'observacao' => 'nullable',
            'estoque_saida' => 'required',
            'id_loja_vendedora' => 'required',
            'levar_maquina' => 'nullable'
        ];
    }
}
