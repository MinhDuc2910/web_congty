<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiveEmailRequest extends FormRequest
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
        $id=session('id');
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:email_recruit,email,'.$id,
            'status'=> 'required|numeric|min:0|max:1',
            

        ];
    }
    public function messages() {
       return [   
        'min' => ':attribute phải lớn hơn :min kí tự',
        'status.min' => ':attribute nhập vào phải là 0 hoặc 1(0 là Khóa, 1 là Mở)',
        'max' => ':attribute nhập vào phải là 0 hoặc 1(0 là Khóa, 1 là Mở)',
        'unique' => ':attribute đã tồn tại trên hệ thống',
        'numeric' => ':attribute nhập vào phải là 0 hoặc 1',
        
       ];
    }

    public function attributes() {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'status' => 'Trạng thái',

            
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
