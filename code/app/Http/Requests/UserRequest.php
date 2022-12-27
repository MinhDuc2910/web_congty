<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Auth\Access\AuthorizationException;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'=> 'required',
            'password'=> 'required'
        ];
    }
    public function messages() {
       return [
        'username' => 'Bạn chưa nhập :attribute',
        'password' => 'Bạn chưa nhập :attribute'
       ];
    }

    public function attributes() {
        return [
            'username' => 'Tên đăng nhập',
            'password' => 'Mật Khẩu'
        ];
    }

    public function withValidator($validator){
    $validator->after(function ($validator) {
        if ($validator->errors()->count() > 0){
            $validator->errors()->add('msg', 'Tên đăng nhập hoặc mật khẩu không chính xác');
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
