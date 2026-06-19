<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // profile page
    public function profile(){
        return view('backend.profile');
    }

    // profiles password update
    public function profilePasswordUpdate(Request $request){
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->password);
                User::where('id', Auth::user()->id)->update(array('password' =>  $users->password));
                return back()->withToastSuccess( 'Password updated successfully');
            } else {
                return back()->withErrors( 'New password can not be the old password !');
            }
        } else {
            return back()->withErrors('Old password doesnt matched !');
        }
    }
}
