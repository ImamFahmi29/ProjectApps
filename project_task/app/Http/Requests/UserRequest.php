<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class UserRequest extends FormRequest
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
    
    public function rules()
    {
        $id = $this->user;
        return [
            
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'date_birth' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'required|min: 8|confirmed'
        // 'address'   => 'required',
        // 'post_code' => 'required',
        // 'no_hp'     => 'required'
        // 'first_name' => 'required',
        // 'last_name' => 'required'
        ];
    }
}
