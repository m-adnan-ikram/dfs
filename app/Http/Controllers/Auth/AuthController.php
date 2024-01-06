<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OtherCredential;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use App\Mail\MyTestMail;



class AuthController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('main');
        }
        return view('auth.register');
    }

    public function registerCustomer(Request $request)
    {
        //Validation
        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required|unique:users',
            'password'    => 'required',
        ]);
        
        //Save Customer Login
        User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'customer',
        ]);
            //Signing in user
            if (!auth()->attempt($request->only('email', 'password'))) {
                return back()->with('danger', 'Invalid login credential');
            }
            return redirect()->route('main');
            //Redirect with success
            // return redirect()->back()->with('success', 'Successfully Register Please Login , Thanks!');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('main');
        }
        return view('auth.login');
    }

    public function customer_login(Request $request)
    {

        $this->validate($request, [
            'email'       => 'required',
            'password'    => 'required',
        ]);

        //Signing in user
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('danger', 'Invalid login credential');
        }
        return redirect()->route('main');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('main');
    }

    public function forget_password()
    {
        return view('auth.forget_password');
    }

    public function googleLogin()
    {
        $setting = OtherCredential::where('type', 'google')->first();
        if (!$setting) {
            return redirect()->route('main');
        }

        // Your data to be set in the config file
        $newData = [
            'google' => [
                'client_id'     => $setting->client_id,
                'client_secret' => $setting->client_secret_key,
                'redirect'      => 'https://moon.sarzone.com/auth/google/callback',
            ],
        ];

        // Use the config helper function to set data
        Config::set('services', $newData);

        return   Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $setting = OtherCredential::where('type', 'google')->first();
            if (!$setting) {
                return redirect()->route('main');
            }

            // Your data to be set in the config file
            $newData = [
                'google' => [
                    'client_id'     => $setting->client_id,
                    'client_secret' => $setting->client_secret_key,
                    'redirect'      => 'https://moon.sarzone.com/auth/google/callback',
                ],
            ];

            // Use the config helper function to set data
            Config::set('services', $newData);
            $user = Socialite::driver('google')->stateless()->user();

            $is_user = User::where('email', $user->getEmail())->first();

            if (!$is_user) {
                $saveUser = User::updateOrCreate(
                    [
                        'email' => $user->getEmail(),
                    ],
                    [
                        'name'      => $user->getName(),
                        'email'     => $user->getEmail(),
                        'role'      => 'customer',
                        'password'  => Hash::make($user->getName() . '@' . $user->getId()),
                    ]
                );
                Auth::login($saveUser);
                return redirect()->route('main');
            } else {
                $saveUser = User::where('email', $user->getEmail())->first();
                Auth::login($saveUser);
                return redirect()->route('main');
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

}
