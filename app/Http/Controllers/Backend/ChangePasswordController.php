<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function change_password(Request $request, User $user){
        $request->validate([
            // 'password' => ['required'],
            // 'password_confirmation' => ['required','same:password']
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'psd' => $request->password,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message', 'User Password Updated Successfully');

    }
}
