<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryRequest extends FormRequest
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
            'company_id' => ['nullable'],
            'service_id' => ['nullable'],
            'from_id' => ['nullable'],
            'to_id' => ['nullable'],
            'timeframe' => ['nullable'],
            'status' => ['nullable'],
            'reference_no' => ['nullable'],
            'country_id' => ['nullable'],
            'region_id' => ['nullable'],
            'subject' => ['nullable'],
            'body' => ['nullable'],
            'sender_type' => ['nullable'],
            'isVerified' => ['nullable'],
            'Is_Drafted' => ['nullable'],
            'Is_Limitted' => ['nullable'],
            'Is_External' => ['nullable'],     
        ];
    }
}
