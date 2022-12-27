<?php

namespace App\Http\Requests\content;

use Illuminate\Foundation\Http\FormRequest;

class IntroduceRequest extends FormRequest
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
        $id = session('id');
        return [
            'title' => 'required|min:6',
            'title_en' => 'required|min:6',
            'prioriti'=> 'required|integer|min:0|unique:content,prioriti,'.$id,
            'file_upload'=> 'mimes:jpg,jpeg,png,gif|max:2048',
            'content'=> 'required|min:6',
            'content_en' => 'required|min:6',
            

        ];
    }
    public function messages() {
       return [   
        'min' => ':attribute phải lớn hơn :min kí tự',
        'integer' => ':attribute phải là số',
        'unique' => ':attribute đã tồn tại trong hệ thống',
        'file_upload.mimes' => ':attribute phải có dịnh dạng đuôi là .jpg .jpeg .png .gif',
        'file_upload.max'=>  ':attribute giới hạn dung lượng không quá 2M',
        
       ];
    }

    public function attributes() {
        return [
            'title' => 'Tiêu đề Tiếng Việt',
            'title_en' => 'Tiêu đề Tiếng Anh',
            'file_upload' => 'File Ảnh',
            'prioriti' => 'Độ ưu tiên',
            'content' => 'Nội dung Tiếng Việt',
            'content_en' => 'Nội dung Tiếng Anh',

            
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

    protected function prepareForValidation(){
        $this->merge([
            'create_at' => date("d-m-Y H:i:s"),
        ]);
    }


    protected function failedAuthorization(){
        throw new AuthorizationException('Bạn Không Có Quyền Truy Cập');
    }
}
