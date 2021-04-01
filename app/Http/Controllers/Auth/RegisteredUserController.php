<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\Generics;

class RegisteredUserController extends Controller
{
    Use Generics;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required',
            'username' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $profile_image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/profile_image', $profile_image);
        }

        $unique_id = $this->createUniqueId('users', 'unique_id');

        Auth::login($user = User::create([
            'unique_id' => $unique_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_name' => $request->username,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
