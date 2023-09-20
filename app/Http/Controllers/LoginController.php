<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //

    public function createLoginForm()
    {
        return view('login.login');
    }

    public function adminLogin(Request $request)
    {
            $admin = Admin::first();

            if($admin->email === $request->email && Hash::check($request->password, $admin->password))
            {
                    session()->put('isAdmin', true);
                    return redirect()->route('company.index');
            }

            return redirect()->route('login.form');
    }

    

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login.form');
    }
}
