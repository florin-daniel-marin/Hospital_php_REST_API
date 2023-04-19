<?php

namespace App\Http\Controllers;

use App\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // show register/create form
    public function create() {
        return view('users.register');
    }

    // create new user
    public function store(Request $request){
        $formFields = $request->validate([
            'employee_type' => 'required',
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8|',  
        ]);
        //create username
        $formFields['username'] = $request['name'] . rand(pow(10, 8 - 1), pow(10, 8) -1);
        if (preg_match("^[0-9A-Za-z_]+$", username) == 0) {
            echo "<p>Invalid username</p>";
        }
        //hash
        $formFields['password'] = bcrypt($formFields['password']);
        '(){}[]|`¬¦!"£$%^&*"<>:;#~_-+=,@.'
        //create user
        $user = User::create($formFields);

        return redirect('/')->with('message', 'Account created');

    }  

     // Logout User
     public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(Auth::attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }





}
