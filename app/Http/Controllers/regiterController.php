<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class regiterController extends Controller
{
    public function create()
    {
       
        return view('/Auth/register');
    }

    public function store(Request $request)
    {
        $attribute = request()->validate([
            'user_name' => ['required'],
            'user_mail' => ['required'],
            'password' => ['required', 'confirmed'],
            'role' => ['required']


        ]);


        $user = new User;
        $user->name = $attribute['user_name'];
        $user->email = $attribute['user_mail'];
        $user->password = Hash::make($attribute['password']);
        $user->role = $attribute['role'];
        $user->save();

        Auth::login($user);
        if($request->User()->role==='Admin')
        {
            return redirect('/Admin/dminDashboard');
        }
        else
        {
            return redirect('/');
        }
    }


    // public function destory()
    // {
    //     Auth::logout();
    //     return redirect('/');
    // }
}