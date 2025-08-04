<?php
class AdminLoginController extends Controller
{
    public function showForm()
    {
        return view('login-admin');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $request->username)
                      ->where('password', $request->password)
                      ->first();

        if ($admin) {
            session(['admin' => $admin->username]);
            return redirect('/dashboard-admin');
        }

        return back()->with('error_admin', 'Username atau password admin salah.');
    }
}