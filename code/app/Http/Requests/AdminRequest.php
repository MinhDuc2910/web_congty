<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'fullname' => 'required|string|min:6',
            'username'=> 'required|alpha_dash|unique:admin|min:3|max:20',
            'password'=> 'required|min:6|max:20',
            'email' => 'bail|required|email|unique:admin',
            'address'=> 'required|min:6'

        ];
    }
    public function messages() {
       return [
        'string' => ':attribute phải là kiểu chữ',
        'min' => ':attribute phải lớn hơn :min kí tự',
        'max' => ':attribute phải nhỏ hơn :max kí tự',
        'regex' => ':attribute phải chưa một trong số các kí tự sau :regex',
        'unique' => ':attribute đã tồn tại trên hệ thống'
       ];
    }

    public function attributes() {
        return [
            'fullname' => 'Họ và tên',
            'username' => 'Tên đăng nhập',
            'password' => 'Mật Khẩu',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            ];
    }

    public function withValidator($validator){
    $validator->after(function ($validator) {
        if ($validator->errors()->count() > 0){
            $validator->errors()->add('msg', 'Dữ liệu bạn nhập chưa đúng, vui lòng xem lại');
        }
        });
    }

    protected function prepareForValidation(){
        $this->merge([
            'create_at' => date("d-m-Y H:i:s"),
        ]);
    }

    protected function failedAuthorization(){
        throw new AuthorizationException('Bạn Không Có Quyền Truy Cập');
    }
}
