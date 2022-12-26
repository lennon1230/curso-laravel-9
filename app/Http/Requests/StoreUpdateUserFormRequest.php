<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {   
        /**
         * $this->id refere-se ao parâmetro ID passado na URL
        */
        $id = $this->id ?? '';

        $rules =  [
            //
            'name' => 'required|string|max:80|min:3',
            'email' => [
                'required',
                'email',
                "unique:users,email,{$id},id"
            ],
            'password' => [
                'required',
                'min:6',
                'max:30',
            ],
        ];
        //PATCH é usado para alterar parcialmente os dados.
        //PUT é para alterar todos os dados.
        if($this->method('PATCH')){
            /*NULLABLE é quando a inserção não é obrigatória, mas caso
            informar, seguir o min e max.*/
            $rules['password'] = [
                'nullable',
                'min:6',
                'max:30',
            ];
        }

        return $rules;
    }
}
