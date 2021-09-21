<?php

namespace App\Http\Controllers;

use App\Models\InviteCode;
use App\Rules\InviteCodeHasQuantity;
use App\Rules\InviteCodeNotExpired;
use Illuminate\Http\Request;

class ActivateStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(Request $request)
    {
        $code = InviteCode::where('code', $request->code)->first();

        $this->validate($request, [
           'code' => [
               'required',
               'exists:invite_codes,code',
               'bail',
               new InviteCodeHasQuantity($code),
               new InviteCodeNotExpired($code),
           ]
        ]);
        dd('activate');
    }
}
