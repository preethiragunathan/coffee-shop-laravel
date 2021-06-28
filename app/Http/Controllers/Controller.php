<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Auth;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	function home()
	{
		return view('user.index');
	}
	function getProfile()
	{
		if(Auth::check())
		{
			return view('user.profile');
		}
		else
		{
			return redirect()->route('user.login');
		}
	}
	function getWallet()
	{
		if(Auth::check())
		{
			return view('user.wallet');
		}
		else
		{
			return redirect()->route('user.login');
		}
	}
	function MyOrders()
	{
		if(Auth::check())
		{
			$user_id=Auth::user()->id;
			$orders=Order::where('user_id', $user_id)->get();
			//return $orders;
			return view('user.my-orders', compact('orders'));
		}
		else
		{
			return redirect()->route('user.login');
		}
	}
	function MyTransactions()
	{
		if(Auth::check())
		{
			$user_id=Auth::user()->id;
			$trans=Transaction::where('user_id', $user_id)->get();
			//return $orders;
			return view('user.transactions', compact('trans'));
		}
		else
		{
			return redirect()->route('user.login');
		}
	}
	function addAmount(Request $request)
	{
		if(Auth::check())
		{
			$user_id=Auth::user()->id;
			$users=User::where('id', $user_id)->first();
			$amount=$request->amount;
			$balance=$users->balance;
			$currentbal=$balance+$amount;
			$users->balance=$currentbal;
			$users->save();
			$trans=new Transaction;
			$trans->user_id=$user_id;
			$trans->amount=$amount;
			$trans->trans_type='credit';
			$trans->remarks='Wallet Deposit';
			$trans->status=1;
			$trans->save();
			Session::flash('message', 'Amount added successfully!'); 
			return view('user.wallet');
		}
		else
		{
			return redirect()->route('user.login');
		}
	}
	function logout()
	{
		auth()->logout();
		return redirect()->route('home');
	}
	function ChangePassword()
	{
		if(Auth::check())
		{
			return view('user.change-password');
		}
		else
		{
			return redirect()->route('user.login');
		}
	}
	function UserpasswordUpdate(Request $request)
	{
		//return $request;
		if(Auth::check())
		{
			if($request['new_password'] == $request['confirm_new_password'])
			{
				$passwordupdate = User::find($request->id);
				$passwordupdate->password = bcrypt($request['new_password']);
				$passwordupdate->save();
				return redirect()->route('user.profile');
			}	
		}
		else
		{
			return redirect('user.login');
		}
	}
	function orderplace(Request $request)
	{
		//return $request;
		if(Auth::check())
		{
			$orders=new Order;
			$user_id=Auth::user()->id;
			$product_id=$request->product_id;
			$product=Product::where('id', $product_id)->first();
			$amount=$product->price;
			$userdet=User::where('id',$user_id)->first();
			$balance=$userdet->balance;
			if($balance>=$amount)
			{
				$current_bal=$balance-$amount;
				$userdet->balance=$current_bal;
				$userdet->save();
				$status="Pending";
				$orders->user_id=$user_id;
				$orders->product=$product_id;
				$orders->amount=$amount;
				$orders->status=$status;
				$orders->save();
				$trans=new Transaction;
				$trans->user_id=$userdet->id;
				$trans->amount=$amount;
				$trans->trans_type='debit';
				$trans->remarks='Order Placed';
				$trans->status=1;
				$trans->save();
				return redirect()->route('myorder');
			}
			else
			{
				Session::flash('message', 'Insufficient Balance!'); 
				return view('user.wallet');
			}
		}
		else
		{
		}
	}
}
