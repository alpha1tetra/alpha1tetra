<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    public function userLogin(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }

        $user = User::where("email", $request->email)->first();
        // dd($user);
        if (is_null($user)) {
            return redirect()->back()->with('error', 'Failed! email not found');
        }
        if (Hash::check($request->password, $user->password)) {

            if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::guard('user')->user();
                // dd($user);
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Whoops! invalid password');
        }
    }


    public function logout(Request $request)
    {

        Auth::guard('user')->logout();
        return redirect('user/login');
    }
}
