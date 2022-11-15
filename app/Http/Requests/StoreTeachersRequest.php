<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachersRequest extends FormRequest
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
            'first_name' => ['required','string'],
            'last_name' =>  ['required','string'],
            'address' =>  ['required','string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:Teachers',
                'regex:/^\w+[-\.\w]*@(?!(?:outlook|myemail|yahoo)\.com$)\w+[-\.\w]*?\.\w{2,4}$/'
            ],
            'phone' =>  ['required'],
            'image' => 'required',  
        ];
        
    }
    public function attributes()
    {
        return [
            'first_name' => 'Họ',
            'last_name' => 'Tên',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
            'image' => 'Ảnh',
        ];
        
    }
  
    public function messages(): array
    {
        
        return [
                    'required' => ' :attribute không được để trống',
                    'string' => ' :attribute phải ở dạng chữ',
                    'email' => 'Sai định dạng email',
                    'address' => 'Địa chỉ email',
                    'phone' => 'Số điện thoại',
                    'image' => 'Ảnh',
        ];
    }
    
}
