<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\TenagaMedis;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        // Cek admin dulu
        $admin = Admin::where('username', $request->login)
            ->orWhere('email', $request->login)
            ->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('login_type', 'admin');
            Session::put('user_id', $admin->id_admin);
            Session::put('user_name', $admin->nama_lengkap);
            return redirect('/dashboard');
        }

        // Cek tenaga medis
        $medis = TenagaMedis::where('username', $request->login)
            ->orWhere('email', $request->login)
            ->first();

        if ($medis && Hash::check($request->password, $medis->password)) {
            Session::put('login_type', 'medis');
            Session::put('user_id', $medis->id_medis);
            Session::put('user_name', $medis->nama_medis);
            return redirect('/dashboard');
        }

        return back()->withErrors(['login' => 'Login gagal. Username/email atau password salah.']);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
