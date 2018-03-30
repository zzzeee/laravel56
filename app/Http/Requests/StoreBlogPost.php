<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
        $other = 'content';
        $name = $this->attributes()[$other];
        return [
            //
            'title' => 'required|max:20',
            'content' => [
                'required',
                $this->valida_post('content', $this->attributes()['content']),
            ]
        ];
    }

    public function valida_post($key, $name)
    {
        return function($attribute, $value, $fail) use($key, $name) {
            if(strlen($value) > strlen(request($key))) {
                return $fail("{$name}的长度不能比:attribute的短!");
            }
            if($value === 'foo') {
                return $fail("该:attribute含有关键字, 禁止使用。");
            }
        };
    }

    /**
     * 获取被定义验证规则的错误消息
     *
     * @return array
     * @translator laravelacademy.org
     */
    public function messages()
    {
        return [];
        // return [
        //     'title.required' => 'A title is required:attribute',
        //     'body.required'  => 'A message is required',
        // ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => '文章标题',
            'content' => '文章内容',
        ];
    }
}
