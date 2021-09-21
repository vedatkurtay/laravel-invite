<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivateStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
           'code' => [
               'required',
               'exists:invite_codes,code'
           ]
        ]);
        dd('activate');
    }
}
