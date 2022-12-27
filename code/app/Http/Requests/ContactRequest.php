<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|min:6',
            'name_en' => 'required|min:6',
            'phone' => 'required|digits_between:9,11',
            'email'=> 'required|email',
            'email_recruit'=> 'required|email',
            'address'=> 'required|min:6',
            'address_en' => 'required|min:6',
            'office'=> 'required|min:6',
            'office_en'=> 'required|min:6',
            

        ];
    }
    public function messages() {
       return [  
        'required' => ':attribute không được bỏ trống' ,
        'min' => ':attribute phải lớn hơn :min kí tự',
        'digits_between' => ':attribute nhập vào phải là kiểu số và có độ dài từ 9-> 11 số',
        
       ];
    }

    public function attributes() {
        return [
            
            'name' => 'Tên công ty',
            'name_en' => 'Tên công ty',
            'phone' => 'Số điện thoại',
            'email'=> 'Email',
            'email_recruit'=> 'Email tuyển dụng',
            'address'=> 'Địa chỉ',
            'address_en' => 'Địa chỉ',
            'office'=> 'Dữ liệu',
            'office_en'=> 'Dữ liệu',

            
            ];
    }

    public function withValidator($validator){
    $validator->after(function ($validator) {
        // dd($validator->errors());
        if ($validator->errors()->count() > 0){
            $validator->errors()->add('msg', 'Dữ liệu bạn nhập chưa đúng, vui lòng xem lại');
        }
        });
    }


    protected function failedAuthorization(){
        throw new AuthorizationException('Bạn Không Có Quyền Truy Cập');
    }
}
