<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\TenagaMedis;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['login' => 'required']);

        // Cek admin/medis berdasarkan email/username
        $user = Admin::where('email', $request->login)->orWhere('username', $request->login)->first();
        $type = 'admin';

        if (!$user) {
            $user = TenagaMedis::where('email', $request->login)->orWhere('username', $request->login)->first();
            $type = 'medis';
        }

        if (!$user) {
            return back()->withErrors(['login' => 'Akun tidak ditemukan.']);
        }

        $otp = rand(100000, 999999);
        Session::put('reset_otp', $otp);
        Session::put('reset_user_id', $user->getKey());
        Session::put('reset_type', $type);

        // Kirim OTP via email
        Mail::raw("Kode OTP Anda adalah: $otp", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Reset Password OTP');
        });

        return redirect()->route('password.otp')->with('success', 'OTP telah dikirim ke email.');
    }

    public function showOtpForm()
    {
        return view('auth.otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);

        if (Session::get('reset_otp') != $request->otp) {
            return back()->withErrors(['otp' => 'OTP salah.']);
        }

        return view('auth.reset');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $type = Session::get('reset_type');
        $id = Session::get('reset_user_id');

        if ($type === 'admin') {
            $user = Admin::find($id);
        } else {
            $user = TenagaMedis::find($id);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Session::forget(['reset_otp', 'reset_user_id', 'reset_type']);

        return redirect('/login')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
