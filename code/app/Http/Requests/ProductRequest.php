<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'file_upload'=> 'mimes:jpg,jpeg,png,gif|max:2048',
            'link_ios'=> 'required',
            'link_android' => 'required',
            'link_window'=> 'required',
            'describe' => 'bail|min:6',
            

        ];
    }
    public function messages() {
       return [   
        'min' => ':attribute phải lớn hơn :min kí tự',
        'file_upload.mimes' => ':attribute phải có dịnh dạng đuôi là .jpg .jpeg .png .gif',
        'file_upload.max'=>  ':attribute giới hạn dung lượng không quá 2M',
       ];
    }

    public function attributes() {
        return [
            'name' => 'Tên game',
            'file_upload' => 'Ảnh sản phẩm',
            'link_ios' => 'Link IOS',
            'link_android' => 'Link Android',
            'link_window' => 'Link Window',
            'describe' => 'Mô tả'
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
