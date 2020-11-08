<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GymRequest extends FormRequest
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
            'full_name'=>'required|min:3',
            'email'=>'required|unique:gyms',
            'password'=>'required',
            'street_address'=>'required|min:10',
            'phoneno'=>'required',
            'gym_detail'=>'required'
        ];
    }
}
