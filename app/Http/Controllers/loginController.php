<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class loginController extends Controller
{
    public function create()
    {
        return view('/Auth/login');
    }

    public function store(Request $request)
    {
        $attribute = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

       
        

        if (! Auth::attempt($attribute)) {

            throw ValidationValidationException::withMessages(['password' => 'sorry, the credentials do not match']);
        }
        request()->session()->regenerate();

        if($request->User()->role==='Admin')
        {
            return redirect('/Admin/dminDashboard');
        }
        else
        {
            return redirect('/');
        }
    }

    public function destory()
    {
        Auth::logout();
        return redirect('/');
        
    }
}
 