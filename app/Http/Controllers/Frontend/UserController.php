<?php

namespace App\Http\Controllers\frontend;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.users.profile');
    }

public function updateUserDetails(Request $request)
{
    $request->validate([
'username' => ['required','string'],
'phone'=>['required','digits:8'],
'address'=>['required','string','max:499'],
    ]);
$user = User::findOrFail(Auth::user()->id);
$user->update([
'name' => $request->username
]);

$user->userDetail()->updateOrCreate(
    [
    'user_id' => $user->id,
    ],
[
'phone' => $request->phone,
'address'=> $request->address,
]
);
return redirect()->back()->with('message','User Profile Updated');
}


public function passwordCreate()
{
    return view('frontend.users.change-password');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required','string','min:8'],
        'password' => ['required', 'string', 'min:8', 'confirmed']
    ]);

    $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
    if($currentPasswordStatus){

        User::findOrFail(Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('message','Password Updated Successfully');

    }else{

        return redirect()->back()->with('message','Current Password does not match with Old Password');
    }
}

public function account()
{
    return view('frontend.account.index');
}



}

