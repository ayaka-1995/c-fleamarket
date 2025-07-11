<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function storeUser(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect('/mypage/profile');
    }

    public function showProfileForm()
    {
        $user = auth()->user();
        return view('mypage.profile', compact('user'));
    }

    public function profile(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        return redirect('/');
    }


    public function loginUser(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが正しくありません。',
        ]);
    }

    public function index()
    {
        return view('index');
    }

    public function logout(){
        return view('auth.login');
    }
}