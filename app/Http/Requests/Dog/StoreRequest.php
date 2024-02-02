<?php

namespace App\Http\Requests\Dog;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'father' => 'required|string|max:80',
            'mother' => 'required|string|max:80',
            'gender' => 'required',
            'race' => 'required',
            'color' => 'required|string',
            'tattoo' => 'required|string',
            'chip' => 'required|string',
            'birthdate' => 'required|date',
            'specialty' => 'required|string',
            // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre debe ser una cadena de texto',
            'name.max' => 'El campo nombre debe tener máximo 100 caracteres',
            'father.required' => 'El campo padre es requerido',
            'father.string' => 'El campo padre debe ser una cadena de texto',
            'father.max' => 'El campo padre debe tener máximo 80 caracteres',
            'mother.required' => 'El campo madre es requerido',
            'mother.string' => 'El campo madre debe ser una cadena de texto',
            'mother.max' => 'El campo madre debe tener un máximo de 80 caracteres',
            'gender.required' => 'El campo género es requerido',
            'race.required' => 'El campo raza es requerido',
            'color.required' => 'El campo color es requerido',
            'color.string' => 'El campo color debe ser una cadena de texto',
            'tattoo.required' => 'El campo tatuaje es requerido',
            'tattoo.string' => 'El campo tatuaje debe ser una cadena de texto',
            'chip.required' => 'El campo chip es requerido',
            'chip.string' => 'El campo chip debe ser una cadena de texto',
            'birthdate.required' => 'El campo fecha de nacimiento es requerido',
            'birthdate.date' => 'El campo fecha de nacimiento debe ser una fecha',
            'specialty.required' => 'El campo especialidad es requerido',
            'specialty.string' => 'El campo especialidad debe ser una cadena de texto',
            // 'photo.required' => 'El campo foto es requerido',
            // 'photo.image' => 'El campo foto debe ser una imagen',
            // 'photo.mimes' => 'El campo foto debe ser un archivo de tipo: jpeg, png, jpg, gif, svg',
            // 'photo.max' => 'El campo foto debe tener un máximo de 1024 caracteres',
        ];
    }
}
