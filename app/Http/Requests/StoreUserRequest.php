<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'user_code'      => [
                'required',
            ],
            'name'           => [
                'required',
            ],
            'email'          => [
                'required',
                'email'
            ],
            'password'       => [
                'required',
                'min:8 ',
                'max:20'
            ],
            'repeatpassword' => [
                'same:password'
            ],
            'phone'         => [
                'numeric',
                'min:9'
            ],
            'gender'         => [
                'required',
            ],
            'address'         => [
                'required',
                'max:255'
            ],
            

        ];
    }
}