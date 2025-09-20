<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Log;
use Validator;

class UserController extends Controller
{
    //
    public function updateUser(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        $user = Auth::user();

        $user->name = $request->username;
        $user->phone_number = $request->phone_number;

        if ($user->save()) {
            return redirect()->back()->with('success', 'Profile updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Error updating profile.');
        }
    }


    public function login(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'required' => 'The :attribute field must be filled'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['Invalid email'])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['Wrong Password'])->withInput();
        }

        Auth::login($user);
        return redirect('/')->with('success', $user);
    }
    public function register(Request $request): RedirectResponse
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'required' => 'The :attribute field must be filled',
            'min' => 'The :attribute length must be at least :min characters',
            'unique' => 'the email has already been taken',
            'confirmed' => 'The password confirmation does not match'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'phone_number' => null,
            'name' => $request->email,
        ]);

        return redirect('/login')->with('success', $user);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
