<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class productoRequest extends Request
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
            'nombre' => 'required|string',
            'marca' =>  'required|string',
            'stock' =>  'numeric|min:0',
            'stockMinimo' => 'required|numeric|min:0',
            'categoria'   => 'required',
            'proveedor'   =>  'required',
            'precio'      =>  'required|numeric|min:0',
            'descripcion' =>  'required|string',
        ];
    }
}
