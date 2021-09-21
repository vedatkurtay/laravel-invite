<?php

namespace App\Http\Requests;

use App\Models\InviteCode;
use App\Rules\InviteCodeApproved;
use App\Rules\InviteCodeHasQuantity;
use App\Rules\InviteCodeNotExpired;
use Illuminate\Foundation\Http\FormRequest;

class ActivateStoreRequest extends FormRequest
{
    public ?InviteCode $inviteCode;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->inviteCode = InviteCode::where('code', $this->code)->first();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'exists:invite_codes,code',
                'bail',
                new InviteCodeHasQuantity($this->inviteCode),
                new InviteCodeNotExpired($this->inviteCode),
                new InviteCodeApproved($this->inviteCode),
            ]
        ];
    }
}
