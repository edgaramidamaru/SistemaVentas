<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloFormRequest extends FormRequest
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
        'idcategoria'=>'required',
        'codigo'=>'required|max:45',
        'nombre'=>'required|max:100',
        'stock'=>'required|numeric',
        'descripcion'=>'max:250',
        'imagen'=>'image|mimes:jpg,jpeg,bmp,png' 
        
        ];
    }
}
