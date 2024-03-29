<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'user_code' => [
                'required',
            ],
            'name' => [
                'required',
            ],
            'email' => [
                'required',
                'email'
            ],
            // 'profile_photo' => [
            //     'image',
            //     'mimes:jpeg,jpg,png,svg,gif',
            //     'max:2048'
            // ],
            'phone' => [
                'numeric',
                'min:10'
            ],
            'gender' => [
                'required',
            ],
            'address' => [
                'required',
                'max:255',
            ],
            'role_id' => [
                'required',
            ]
        ];
    }
}