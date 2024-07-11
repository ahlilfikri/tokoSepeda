<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function welcome()
    {
        return view('layouts.app');
    }

    public function register()
    {
        return view('auth.register');
    }
    
    public function registerPost(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'kode' => 'required|string',
            ]);
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->kode; // Ensure this matches the form input name
            $user->password = Hash::make($request->password);
            $user->save();
            
            return redirect('login')->with('success', 'Registration successful. Please login.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    
    

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('welcome')->with('success', 'Login successful');
            }
            return back()->with('error', 'Invalid email or password');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function createAdmin()
    {
        $adminExists = User::where('email', 'admin123@gmail.com')->exists();

        if (!$adminExists) {
            $admin = new User();
            $admin->name = 'Admin';
            $admin->email = 'admin123@gmail.com';
            $admin->role = 'admin';
            $admin->password = Hash::make('admin123');
            $admin->save();

            $owner = new User();
            $owner->name = 'Owner';
            $owner->email = 'owner123@gmail.com';
            $owner->role = 'owner';
            $owner->password = Hash::make('owner123');
            $owner->save();

            return redirect()->route('welcome');
        }

        return redirect()->route('welcome');
    }
}
    