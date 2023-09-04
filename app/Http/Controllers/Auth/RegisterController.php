<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/layouts/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required' , 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'  , 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role = isset($data['role']) ? $data['role'] : null;
    
        try {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $role,
                'password' => Hash::make($data['password']),
            ]);
        } catch (\Exception $e) {
            // Handle database-related errors
            if ($e instanceof \Illuminate\Database\QueryException) {
                if ($e->errorInfo[1] == 1062) { // Duplicate entry error code
                    return redirect()->back()->withInput()->withErrors(['email' => 'This email is already registered.']);
                }
            }
    
            // Handle other exceptions here if needed
    
            // Log the error for further investigation
            \Log::error('Database error during registration: ' . $e->getMessage());
    
            // Redirect back with a generic error message
            return redirect()->back()->withInput()->withErrors(['general' => 'An error occurred during registration. Please try again later.']);
        }
    }
}
