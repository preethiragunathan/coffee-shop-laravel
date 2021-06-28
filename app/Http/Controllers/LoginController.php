<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    function showLoginForm()
	{
		return view('user.login');
	}
	function showRegisterForm()
	{
		return view('user.register');
	}
	function registration(Request $request)
	{
		$insuser=new User;
		$insuser->first_name=$request->fname;
		if(isset($request->lname) && $request->lname!='')
		$insuser->last_name=$request->lname;
		$insuser->mobile=$request->mobile;
		$insuser->email=$request->email;
		$insuser->password=bcrypt($request->password);
		$insuser->status=1;
		$insuser->save();
		return redirect()->route('user.login');
	}
	function login(Request $request)
	{
		$remember_me = $request->has('remember') ? true : false; 
		if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status'=> 1], $remember_me))
		{
			$user = auth()->user();
			//dd($user);
			return redirect()->route('home');
		}
		else
		{
			return redirect()->route('user.login')->with('error','your username and password are wrong.');
		}
	}
}
