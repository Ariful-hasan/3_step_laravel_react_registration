<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        return [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',

            'street' => 'required',
            'house_no' => 'required',
            'zip' => 'required',
            'city' => 'required',

            'account' => 'required',
            'iban' => 'required',
        ];
    }
}
