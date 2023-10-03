<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * display login view.
     */
    public function loginView()
    {
        return view('auth.login');
    }

    /**
     * authenticate user credentials
     */
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:8'],
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->getMessageBag());
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            return redirect()->route('chatio.room')->with('success', 'Successfully Logged in');
        }
    }

    /**
     * display register view.
     */
    public function registerView()
    {
        return view('auth.register');
    }

    /**
     * register new users.
     */
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->getMessageBag());
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('auth.login')->with('success', 'User Successfully Created');
    }

    /**
     * logout from authenticated users.
     */
    public function logoutUser(Request $request)
    {
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('auth.login')->with('success', 'Successfully Logout');
    }
}
 