<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Kiểm tra quyền người dùng.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Định dạng của form request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'role_id'  => "required",
            'name'     => "required",
            'password' => 'nullable',
            'email'    => 'required',
        ];
    }
}
