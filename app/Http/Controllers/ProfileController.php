<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\TenagaMedis;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $loginType = Session::get('login_type');
        $userId = Session::get('user_id');

        if ($loginType === 'admin') {
            $user = Admin::find($userId);
        } elseif ($loginType === 'medis') {
            $user = TenagaMedis::find($userId);
        } else {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        return view('profile.index', compact('user', 'loginType'));
    }
}
