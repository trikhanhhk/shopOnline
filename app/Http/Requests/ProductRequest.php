<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'brand_id'          => "required",
            'type_id'           => "required",
            'name'              => 'required',
            'win'               => 'required',
            'cpu'               => 'required',
            'manHinh'           => 'required',
            'ram'               => 'required',
            'oCung'             => 'required',
            'unit_price'        => 'required',
            'promotion_price'   => 'required',
            'discount'          => 'required',
            'description'       => 'required',
            'image'             => 'required'
        ];
    }
}
