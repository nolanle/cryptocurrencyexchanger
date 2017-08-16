<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Requests\ChangePasswordRequest;
use App\ResizeImageService;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $user = User::find($request->user()->id);

        $wallets = $user->wallets()->get();
        //$wallets = $user->wallets()->find(2)->currency();
        //dd($wallets);

        return view('member.index',[
            'wallets' => $wallets
        ]);
    }

    public function updateProfile(Request $request)
    {
        //dd($request->all());
        $request->user()->update([
           'name' => $request->name,
            'nickname' => $request->nickname
        ]);

        return back()->with('success', 'Your name has been changed!');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        if ( Hash::check($request->old_password, $request->user()->password ) )
        {
            $request->user()->update([
               'password' => bcrypt($request->password)
            ]);

            return back()->with('success', 'Your password has been changed!');
        }
        else{
            return back()->with('danger', 'Your old password invalid!');
        }
    }

    protected function uploadAvatar(Request $request)
    {
        if ( $request->hasFile('avatar'));
        {
            list($width, $height) = getimagesize($request->file('avatar'));
            //dd($request->file('avatar')->getClientSize());
            $max = $height - $width >= 0 ? $width : $height;
            $fileName = Uuid::generate().'.'.$request->file('avatar')->getClientOriginalExtension();
            $imageThumb = new ResizeImageService($request->file('avatar'));
            $imageThumb->createThumb("storage/$fileName", $max, $max);
            $request->user()->update([
                'avatar' => url( Storage::url($fileName) )
            ]);
        }
        return back();
    }


}
