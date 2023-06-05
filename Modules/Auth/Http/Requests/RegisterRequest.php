<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'sometimes|email|unique:users',
            'phone' => ['required', 'phone:AUTO,mobile'],
            'password' => 'required|min:6|confirmed',
            'adresse' => 'required',
            'sexe' => 'required',
            'nationalite' => 'required',
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
