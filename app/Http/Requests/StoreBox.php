<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBox extends FormRequest
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
            'name' => 'required',
            'weight' => 'required|integer|min:0',
            'boxColor' => 'required|regex:/rgb\(\s*[0-9]+\s*,\s*[0-9]+\s*,\s*[0]+\s*\)/', //Blå måste vara 0
            'destination' => 'required|in:Sweden,China,Brazil,Australia', //Måste innehålla något av dessa värden
        ];
    }

    public function messages() {
        return [
            'name.required' => 'You need to enter a name',
            'weight.required' => 'You need to enter weight',
            'weight.integer' => 'You need to enter valid weight',
            'weight.min' => 'Negative weight is not valid',
            'boxColor.required' => 'You need to enter box color',
            'boxColor.regex' => 'You need to enter a valid format, Rgb(0,0,0), all shades of blue are forbidden',
            'destination.required' => 'You need to enter a destination',
            'destination.in' => 'You need to enter a valid destination'
        ];
    }
}
