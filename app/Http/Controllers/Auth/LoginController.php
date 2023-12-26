<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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

    public function login(Request $request)
    {
        // dd($request->all());

        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $custommessages = [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ];

        $this->validate($request, $rules, $custommessages);

        try {
            $data = $request->all();
            unset($data['_token']);
            $user = User::where('email', $request->email)->first();
            // dd(Auth::attempt($data), $user->status == "active");
            if ($user->status == "inactive") {
                # code...
                return redirect()
                    ->back()
                    ->with('error', 'User Is Not Active');
            } else {
                # code...
                if ((Auth::attempt($data))) {
                    // dd(auth()->user());
                    return redirect()->route('home');
                } else {
                    // validation not successful, send back to form
                    return redirect()
                        ->back()
                        ->with('error', 'Login Failure');
                }
            }
        } catch (\Exception $e) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
