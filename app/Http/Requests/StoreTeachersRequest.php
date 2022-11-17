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
            'fullname' => ['required','string'],
            'city' =>  ['required','string'],
            'district' =>  ['required','string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:Teachers',
            ],
            'phone' =>  ['required'],
            'gender' =>  ['required','in:1,2'],
            'birthdate' =>  ['required','date_format:m/d/Y'],
            'image' =>  [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'mimetypes:image/jpeg,image/png,image/jpg',
                'max:2048',
            ],
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
                    'unique' => ":attribute đã tồn tại ",
                    'required' => ' :attribute không được để trống',
                    'string' => ' :attribute phải ở dạng chữ',
                    'email' => 'Sai định dạng email',
                    'address' => 'Địa chỉ email',
                    'phone' => 'Số điện thoại',
                    'image' => 'Ảnh',
                    'max'=>'dung lượng file không được quá 2MB',
                    'in'=>'Bạn không được phép chỉnh sửa'
        ];
    }
    
}
