<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function authenticated(Request $request, $user)
    {
        if ($user->status == 'aktif') {
            if($user->akses == 'admin' || $user->akses == 'admin'){
                return redirect()->route('adminadmin.beranda');
            }elseif($user->akses == 'mahasiswa'){
                return redirect()->route('mahasiswamahasiswa.beranda');
            }elseif ($user->akses == 'dosen') {
                return redirect()->route('dosen.beranda');
            }
        } else {
            Auth::logout();
            flash()->addError('Akun Anda tidak aktif. Silahkan hubungi admin', 'Maaf');
            return redirect()->route('login');
        }

        // if($user->akses == 'admin' || $user->akses == 'admin'){
        //     return redirect()->route('adminadmin.beranda');
        // }elseif($user->akses == 'mahasiswa'){
        //     return redirect()->route('mahasiswamahasiswa.beranda');
        // }else{
        //     Auth::logout();
        //     flash()->addSuccess('Anda tidak memiliki hak akses');
        //     return redirect()->route('login');
        // }
    }

}
