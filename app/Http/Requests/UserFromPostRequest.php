<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserFromPostRequest extends Request
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
            'username' => 'required|max:255',
            'password' => 'required',
            // 'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
             'username.required' => '用户名不能为空',
             'username.max' => '用户名最大不能超过255个字符',
             'password.required' => '密码不能为空',
             // 'email.required' => '邮箱账号不能为空',
        ];
    }
}
