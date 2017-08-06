<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadEmail(Request $request, $id=0)
    {
        return view('emails.registered', [
            'user' => $request->user(),
            'password' => 'abcXXX',
            'ip' => '192.100.100.100'
        ]);
    }
}
