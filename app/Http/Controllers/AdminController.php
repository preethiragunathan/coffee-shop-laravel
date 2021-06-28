<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Admin;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    function login()
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Product';
			$pass['active'] = 'product';
			return redirect()->route('product',$pass);
		}
		else
		{
			return view('admin.login');
		}
	}
	function home()
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Product';
			$pass['active'] = 'product';
			return view('admin.product', $pass);
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function loginPost(Request $request)
	{
		//return bcrypt($request->admin_password);
		if (Auth::guard('admin')->attempt(array('email' =>$request['admin_email'], 'password' => $request['admin_password'])))
		{
            return redirect()->route('product')->with('msg', 'Successfully Login');
        }
		else
		{
			Session::flash('message', 'Check Login Details!'); 
			return redirect()->route('login');
		}
	}
	function logout()
	{
		Session::flush();
		return redirect()->route('login');
	}
	function Product()
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Products';
			$pass['active'] = 'product';
			return view('admin.product-list', $pass);
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function ProductForm()
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Product Add';
			$pass['active'] = 'product';
			return view('admin.product-add', $pass);
		}
		else
		{
			return redirect()->route('login');
		}
	}
	
	function ProductAdd(Request $request)
	{
		if(Auth::guard('admin')->check())
		{
			//return $request;
			$productadd = new Product;
			$productadd->product_name = $request['product_name'];
			$productadd->price = $request['price'];
			$this->validate($request, ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
				$image = md5(date("Y-m-d H:m:s")).'.'.$request->image->extension();  
				$productadd->image=$image;
				$request->image->move('public/admin/assets/img/products-uploads', $image);
			$productadd->description = $request['description'];
			$productadd->save();
			return redirect()->route('product');
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function ProductEdit($id)
	{
		if(Auth::guard('admin')->check())
		{
			//return $id;
			$pass['pageTitle'] = 'Product Edit';
			$pass['active'] = 'product';
			return view('admin.product-edit',$pass, compact('id'));
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function ProductUpdate(Request $request)
	{
		if(Auth::guard('admin')->check())
		{
		    //return $request;
			$Product = Product::find($request->id);
			$Product->product_name = $request['product_name'];
			$Product->price = $request['price'];
			$Product->description = $request['description'];
			if(isset($request['image']) && $request['image'] == "")
			{
				$Product =$Product->image;
			}
			if(isset($request['image']) && $request['image'] != "")
			{
				$this->validate($request, ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
				$image = md5(date("Y-m-d H:m:s")).'.'.$request->image->extension();  
				$Product->image=$image;
				$request->image->move('public/admin/assets/img/products-uploads', $image);
			}
			$Product->save();
			
			return redirect()->route('product');
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function ProductDelete(request $request)
	{
		if(Auth::guard('admin')->check())
		{
			//return $request;
			$Productdelete = Product::find($request->id);
			$Productdelete->status = 100;
			$Productdelete->save();
			return redirect()->route('product');
		}
		else
		{
			return redirect('admin');
		}
	}
	function Customer()
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Customers';
			$pass['active'] = 'customer';
			return view('admin.customer-list', $pass);
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function CustomerForm()
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Customers';
			$pass['active'] = 'customer';
			return view('admin.customer-form', $pass);
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function CustomerAdd(Request $request)
	{
		if(Auth::guard('admin')->check())
		{
			//return $request;
			$customeradd = new User;
			$customeradd->first_name = $request['first_name'];
			$customeradd->last_name = $request['last_name'];
			$customeradd->mobile_number = $request['mobile_number'];
			$customeradd->email = $request['email'];
			$customeradd->save();
			return redirect()->route('customer');
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function CustomerEdit($id)
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Customers';
			$pass['active'] = 'customer';
			return view('admin.customer-edit',$pass, compact('id'));
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function CustomerUpdate(Request $request)
	{
		if(Auth::guard('admin')->check())
		{
		    //return $request;
			$customerUpdate = User::find($request->id);
			$customerUpdate->first_name = $request['first_name'];
			$customerUpdate->last_name = $request['last_name'];
			$customerUpdate->mobile_number = $request['mobile_number'];
			$customerUpdate->email = $request['email'];
			$customerUpdate->save();
			return redirect()->route('customer');
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function CustomerDelete(request $request)
	{
		if(Auth::guard('admin')->check())
		{
			$customerdelete = User::find($request->id);
			$customerdelete->status = 100;
			$customerdelete->save();
			return redirect()->route('customer');
		}
		else
		{
			return redirect('admin');
		}
	}
	function Profile()
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Profile';
			$pass['active'] = 'profile';
			return view('admin.profile', $pass);
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function ProfileEdit()
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Profile Edit';
			$pass['active'] = 'profile';
			return view('admin.profile-edit', $pass);
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function profileUpdate(request $request)
	{
		if(Auth::guard('admin')->check())
		{
			//return $request;
			$profileupdate = Admin::find($request->id);
			$profileupdate->first_name = $request['first_name'];
			$profileupdate->last_name = $request['last_name'];
			$profileupdate->mobile_number = $request['mobile_number'];
			$profileupdate->email = $request['email'];
			$profileupdate->save();
			return redirect()->route('profile');
		}
		else
		{
			return redirect('admin');
		}
	}
	function ChangePassword()
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Change Password';
			$pass['active'] = 'profile';
			return view('admin.change-password', $pass);
		}
		else
		{
            return redirect()->route('login')->with(['message' => "Login Must"]);
		}
	}
	function passwordUpdate(request $request)
	{
		if(Auth::guard('admin')->check())
		{
			$oldpass = Auth::guard('admin')->user()->password;
			$reqoldpass = Hash::make($request['old_password']);
			//return $reqoldpass;
			$passwordupdate = Admin::find($request->id);
			$passwordupdate->password = Hash::make($request['new_password']);
			$passwordupdate->save();
			return redirect()->route('profile');
		}
		else
		{
			return redirect('admin');
		}
	}
	function Order()
	{
		if(Auth::guard('admin')->check())
		{
			$orders=Order::get();
			$pass['pageTitle'] = 'Orders';
			$pass['active'] = 'order';
			return view('admin.order-list', $pass, compact('orders'));
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function OrderEdit($id)
	{
		if(Auth::guard('admin')->check())
		{
			$pass['pageTitle'] = 'Customers';
			$pass['active'] = 'customer';
			return view('admin.order-edit',$pass, compact('id'));
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function OrderUpdate(Request $request)
	{
		if(Auth::guard('admin')->check())
		{
		    //return $request;
			$customerUpdate = Order::find($request->id);
			$customerUpdate->status = $request['status'];
			$customerUpdate->save();
			return redirect()->route('order');
		}
		else
		{
			return redirect()->route('login');
		}
	}
	function OrderDelete(request $request)
	{
		if(Auth::guard('admin')->check())
		{
			$customerdelete = Order::find($request->id);
			$customerdelete->status = 100;
			$customerdelete->save();
			return redirect()->route('order');
		}
		else
		{
			return redirect()->route('login');
		}
	}
}
