<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $delivery_status = [];
        $method = $this->route()->getActionMethod();

        switch ($this->method()) {
            case 'POST':
                switch ($method) {
                    case 'add':
                        $delivery_status = [
                            'oder_id' => 'required|unique:oder_status',
                            'status' => 'required|unique:oder_status',
                        ];
                        break;
                    case 'edit':
                        $delivery_status = [
                            'oder_id' => 'required|unique:oder_status',
                            'status' => 'required|unique:oder_status',
                        ];
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;
        }

        return $delivery_status;
    }
    public function messages(){
        return [
            'oder_id.required'=>'không được bỏ trống',
            'oder_id.unique'=>'đã tồn tại',
            'status.required'=>'không được bỏ trống',
            'status.unique'=>'đã tồn tại'
        ];
    }
}
