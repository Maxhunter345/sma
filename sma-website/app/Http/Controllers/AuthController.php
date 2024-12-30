<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
   public function showLogin()
   {
       return view('auth.login');
   }

   public function login(Request $request)
   {
       $credentials = $request->validate([
           'email' => 'required|email',
           'password' => 'required'
       ]);

       Log::info('Login attempt:', [
           'email' => $request->email
       ]);

       if (Auth::attempt($credentials)) {
           $request->session()->regenerate();
           
           Log::info('Login successful:', [
               'user' => Auth::user(),
               'is_admin' => Auth::user()->is_admin
           ]);

           if (Auth::user()->is_admin) {
               return redirect()->intended('admin/dashboard');
           }

           return redirect()->intended('/');
       }

       return back()->withErrors([
           'email' => 'The provided credentials do not match our records.',
       ])->withInput();
   }

   public function showRegister()
   {
       return view('auth.register');
   }

   public function register(Request $request)
   {
       try {
           $validated = $request->validate([
               'name' => 'required|string|max:255',
               'email' => [
                   'required',
                   'string',
                   'email',
                   'max:255',
                   'unique:users',
                   function ($attribute, $value, $fail) {
                       $domain = substr(strrchr($value, "@"), 1);
                       if (!in_array($domain, ['gmail.com', 'student.com', 'admin.com'])) {
                           $fail('Please use a valid email domain (@gmail.com, @student.com, or @admin.com).');
                       }
                   },
               ],
               'password' => 'required|string|min:8|confirmed',
           ]);

           $isAdmin = (substr(strrchr($validated['email'], "@"), 1) === 'admin.com');

           $user = User::create([
               'name' => $validated['name'],
               'email' => $validated['email'],
               'password' => Hash::make($validated['password']),
               'is_admin' => $isAdmin,
           ]);

           Auth::login($user);

           if($isAdmin) {
               return redirect('/admin/dashboard')->with('success', 'Registration successful! Welcome Admin.');
           }

           return redirect('/')->with('success', 'Registration successful! Welcome to E-Learning.');

       } catch (\Exception $e) {
           return back()
               ->withErrors(['error' => $e->getMessage()])
               ->withInput($request->except('password', 'password_confirmation'));
       }
   }

   public function logout(Request $request)
   {
       Auth::logout();

       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return redirect('/')
           ->with('success', 'You have been successfully logged out.');
   }

   public function isAdmin()
   {
       return Auth::check() && Auth::user()->is_admin;
   }
}