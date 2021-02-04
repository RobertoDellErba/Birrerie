<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBreweries extends FormRequest
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
            'name'=>'required|max:30',
            'description'=>'required|max:500',
            'img'=>'required|image|mimes:jpeg,png,jpg',
            'lat'=>['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lon'=>['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ];    
    }
    public function messages()
    {
        return [
            'name.required'=>'Abbiamo bisogno di un nome per questa birreria',
            'name.max'=>'Il nome è troppo lungo',
            'description.required'=>'Raccontaci qualcosa della tua birreria preferita',
            'description.max'=>'La descrizione è troppo lunga', 
            'img.required'=>'Facci vedere la tua birreria',
            'img.mimes'=>'Questo formato non è supportato',
            'lat.required'=>'Inserisci una latitudine', 
            'lon.required'=>'Inserisci una longitudine',         
        ];    
    }
}
