<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;


class HomeController extends Controller
{
    public function index() {
        $product=Product::paginate(3);
        return view('home.userpage',compact('product'));
    }


    public function redirect()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Retrieve the user type
            $usertype = Auth::user()->usertype;

            // Determine the view based on the user type
            if ($usertype == '1') {
                return view('admin.home');
            } else {
                $product=Product::paginate(3);
                return view('home.userpage',compact('product'));
            }
        }


        // If the user is not authenticated,  might want to redirect them to the login page
        return redirect()->route('login');
    }

    public function product_details($id){
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user=Auth::user();
            $product=product::find($id);
            $cart=new cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;

            if ($product->discount_price!=null){
            $cart->price=$product->discount_price * $request->quantity;
            }else {
            $cart->price=$product->price * $request->quantity;
            }
            
            $cart->image=$product->image;
            $cart->product_id=$product->id;
            $cart->quantity=$request->quantity;

            $cart->save();
            return redirect()->back();
           
        }else{
            return redirect('login');
        }
    }
}
