<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Order;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
	/*public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'exception']]);
    }*/
    public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'firstname'=>'required|min:2',
			'mobile' => 'required|min:10|unique:user',
			'email'=>'required|email|unique:user',
			'password' => 'required|min:8|max:16',
			'confirm_password' => 'required|min:8|max:16|same:password',
		]);
		if($validator->fails()){
				return response()->json($validator->messages(), 200);
		}
		$user = User::create([
        	'first_name' => $request->firstname,
			'last_name' => $request->lastname,
			'mobile' => $request->mobile,
        	'email' => $request->email,
        	'password' => bcrypt($request->password),
			'status' => 1
        ]);
		$Message="Registered Successfully!";
		return response()->json(compact('Message'),200);
	}
	public function exception(Request $request)
	{
		$error = "Unauthorized";
        return response()->json(compact('error'),400);		
	}
	public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|min:8|max:16|'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'status' => 'Failed',
                	'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json([
                	'status' => 'Failed',
                	'message' => 'Could not create token.',
                ], 500);
        }
        return response()->json([
            'status' => 'Success',
            'token' => $token,
        ]);
    }
	public function get_user()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return response()->json(['user' => $user]);
    }
 	public function getWallet()
	{
		$user = JWTAuth::parseToken()->authenticate();
		if($user)
		{
			return response()->json([
            'status' => 'Success',
            'Wallet Balance' => $user->balance,
        	]);
		}
	}
	public function addwallet(Request $request)
	{
		$user = JWTAuth::parseToken()->authenticate();
		if($user)
		{
			if(isset($request->amount) && $request->amount!=0)
			{
				$userdet=User::where('id',$user->id)->first();
				$amount=abs($request->amount);
				$balance=$userdet->balance;
				$currentbal=$balance+$amount;
				$userdet->balance=$currentbal;
				$userdet->save();
				$trans=new Transaction;
				$trans->user_id=$userdet->id;
				$trans->amount=$amount;
				$trans->trans_type='credit';
				$trans->remarks='Wallet Depoist';
				$trans->status=1;
				$trans->save();
				return response()->json([
				'status' => 'Success',
				'Message' => 'Amount added successfully',
				]);
			}
			else
			{
				return response()->json([
				'status' => 'Failed',
				'Message' => 'Please enter valid amount',
				]);
			}
		}
	}
	public function getProducts()
	{
		$user = JWTAuth::parseToken()->authenticate();
		if($user)
		{
			$products=Product::get();
			foreach($products as $p)
			{
				$res['product_id']=$p['id'];
				$res['product_name']=$p['product_name'];
				$res['price']=$p['price'];
				$res['description']=$p['description'];
				$res['image']='http://localhost/coffee-shop/public/admin/assets/img/products-uploads/'.$p['image'];
				$resp[]=$res;
				return response()->json([
				'status' => 'Success',
				'Response' => $resp
				]);
			}
		}
	}
	public function orderCreate(Request $request)
	{
		$user = JWTAuth::parseToken()->authenticate();
		if($user)
		{
			$orders=new Order;
			$user_id=$user->id;
			$product_id=$request->product_id;
			$product=Product::where('id', $product_id)->first();
			$amount=$product->price;
			$userdet=User::where('id',$user->id)->first();
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
				return response()->json([
					'status' => 'Success',
					'Message' => "Your order has beed placed successfully"
					]);
			}
			else
			{
				return response()->json([
					'status' => 'Success',
					'Message' => "Wallet balance is insufficient"
					]);
			}
		}
	}
	public function getOrders()
	{
		$user = JWTAuth::parseToken()->authenticate();
		if($user)
		{
			$orders=Order::where('user_id', $user->id)->get();
			foreach($orders as $order)
			{
				$product=Product::where('id', $order->product)->first();
				$res['product_name']=$product['product_name'];
				$res['price']=$order['amount'];
				$res['description']=$product['description'];
				$res['image']='http://localhost/coffee-shop/public/admin/assets/img/products-uploads/'.$product['image'];
				$res['order_status']=$order['status'];
				$resp[]=$res;
			}
			return response()->json([
				'status' => 'Success',
				'Response' => $resp
				]);
		}
	}
	public function edituser(Request $request)
	{
		$user = JWTAuth::parseToken()->authenticate();
		if($user)
		{
			$userdet=User::where('id',$user->id)->first();
			if(isset($request->first_name) && $request->first_name)
			{
				$userdet->first_name=$request->first_name;
			}
			if(isset($request->last_name) && $request->last_name)
			{
				$userdet->last_name=$request->last_name;
			}
			if(isset($request->mobile) && $request->mobile)
			{
				$userdet->mobile=$request->mobile;
			}
			$userdet->save();
			return response()->json(['Message' => 'Successfully updated']);
		}
	}
	public function getTransaction()
	{
		$user = JWTAuth::parseToken()->authenticate();
		if($user)
		{
			$transactions=Transaction::where('user_id', $user->id)->get();
			foreach($transactions as $trans)
			{
				$res['amount']=$trans['amount'];
				$res['trans_type']=$trans['trans_type'];
				$res['remarks']=$trans['remarks'];
				$res['datetime']=$trans['created_datetime'];
				$resp[]=$res;
			}
			return response()->json([
				'status' => 'Success',
				'Response' => $resp
				]);
		}
	}
    public function logout()
    {
        auth()->logout();
        return response()->json(['Message' => 'User successfully signed out']);
    }
}
