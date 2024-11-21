<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'Fecha_de_reserva' => 'required',
            'Lugar' => 'required',
			'Duracion' => 'required',
			'Nombre_del_alumno' => 'required|string',
			'Codigo_del_alumno' => 'required|string',
        ];
    }
}
