<?php

namespace Modules\Paiement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'noms' => 'required',
            'sexe' => 'required',
            'adresse' => 'required',
            'etatcivil' => 'required',
            'email' => 'required',
            'fonction_id' => 'required',
            'contact' => 'required',
            'nationalite' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
