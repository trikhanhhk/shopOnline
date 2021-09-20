<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Slide;
use App\Models\TypeProduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\MockObject\Stub\Exception;
//use Mail;
class HomeController extends Controller
{
//    public function sendMail() {
//        $to_name = "Khanh";
//        $to_email = "trikhanhm10@gmail.com";//send to this email
//        $len = 10;
//        $code = substr(md5(rand()), 0, $len);
//        $data = array("code"=>$code); //body of mail.blade.php
//
//                Mail::send('send_mail',$data,function($message) use ($to_name,$to_email){
//                    $message->to($to_email)->subject('Lấy lại mật khẩu');//send this mail with subject
//                    $message->from("trikhanhtk0038@gmail.com",$to_name);//send from this mail
//                });
//        return redirect("/");
//    }
    public function index()
    {
        $laptops = Product::where('type_id', 1)->get();
        $phones = Product::where('type_id', 2)->get();
        $phuKien = Product::where('type_id', 3)->get();
        $slides = Slide::where('status', 1)->skip(0)->take(4)->get();
//        dd($slides[0]['images']);
        return view('home.index', compact('laptops', 'phones', 'phuKien', 'slides'));
    }

    public function detailProduct(Request $request, $pid)
    {
        $data = Product::where('id', $pid)->first();
        return view('home.detailProduct', compact('data'));
    }

    public function product(Request $request, $id)
    {
        $sBrand = $request->input('brand');
        $sRam = $request->input('ram');
        $sMoney = $request->input('tien');
        $start =0;
        $end = 1000000000;
        $query = Product::query()->where('type_id', $id);
        if ($sBrand > 0) {
            $query->where('brand_id', $sBrand);
        }
        if ($sRam > 0) {
            $query->where('ram', "LIKE", "%" . $sRam . "%");
        }
        switch ($sMoney){
            case "1ph":{
                $start = 1000000;
                $end = 5000000;
                break;
            }
            case "5":{
                $start = 5000000;
                $end = 10000000;
                break;
            }
            case "10":{
                $start = 10000000;
                $end = 15000000;
                break;
            }
            case "15":{
                $start = 15000000;
                $end = 20000000;
                break;
            }
            case "20":{
                $start = 20000000;
                $end = 25000000;
                break;
            }
            case "25":{
                $start = 25000000;
                $end = 1000000000;
                break;
            }
        }
        if($sMoney !==''){
            $query->where('unit_price','>=',$start)->where('unit_price','<',$end);
        }
        $data = $query->get();
        $brand = Brand::all();
        $caption = TypeProduct::where('id', $id)->value('description');
        return view('home.products', compact('data', 'brand', 'caption', 'id'));
    }

    public function checkOut()
    {
        $money = 0;
        $data = session()->get('cart');
        foreach ($data as $value) {
            $money = $money + $value['price'] * $value['quantity'];
        }

        return view('home.checkOut', compact('money'));
    }

    public function createDB(Request $request)
    {

        $cart = session()->get('cart');
        $money = 0;
        $quantity = 0;
        foreach ($cart as $key => $value) {
            $money = $money + $value['price'] * $value['quantity'];
            $quantity = $quantity + 1;
        }


        $cus = new Customer;
        $cus->name = $request->name;
        $cus->email = Auth::user()->email;
        $cus->address = $request->address;
        $cus->phone = $request->phone;
        $cus->note = $request->note;
        $cus->save();

        $bill = new Bill;
        $bill->customer_id = $cus->id;
        $bill->status = 0;
        $bill->payment = $request->thanhToan;
        $bill->note = $request->note;
        $bill->quantity = $quantity;
        $bill->total = $money;
        $bill->save();

        foreach ($cart as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->bill_id = $bill->id;
            $bill_detail->product_id = $value['id'];
            $bill_detail->quantity = $value['quantity'];
            $bill_detail->price = $value['price'];
            $bill_detail->save();

        }


        session()->forget('cart');


        return redirect('home')->with('ok', 'ok');


    }

    public function abc()
    {
        return view('home.abc');
    }

    public function contactUs()
    {
        return view('home.contactUs');
    }

    public function aboutUs()
    {
        return view('home.aboutUs');
    }

    public function showCart()
    {
        $cart = session()->get('cart');
        return view('home.showCart', compact('cart'));
    }

    public function updateCart(Request $request)
    {

        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            $cart = session()->get('cart');

            $showCart = view('home.cart_component', compact('cart'))->render();
            return response()->json(['showCart' => $showCart, 'code' => 200], 200);
        }
    }

    public function deleteCart(Request $request)
    {

        if ($request->id) {
            $product = Product::where('id', $request->id)->first();
            $cart = session()->get('cart');
            unset($cart[$request->id]);
//            $quantity = $cart[$request->id]['quantity'];
//            $product->discount = $product->discount + $quantity;
            session()->put('cart', $cart);
            $cart = session()->get('cart');
            $showCart = view('home.cart_component', compact('cart'))->render();
            return response()->json(['showCart' => $showCart, 'code' => 200], 200);
        }
    }
    public function deleteBill($id){
        $bill = Bill::where('id',$id)->first();
        $bill->status = 3;
        $bill->save();
        return redirect('history');
    }

    public function addToCart($id)
    {
        $product = Product::where('id', $id)->first();
        $cart = session()->get('cart');
        if($product->discount >0) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
                $product->discount = $product->discount - $cart[$id]['quantity'];
                if($product->discount < 0) {
                    return response()->json([
                        'code' => 300,
                        'message' => 'success'
                    ], 200);
                }
            } else {
                if ($product->promotion_price === 0) {
                    $cart[$id] = [
                        'id' => $id,
                        'name' => $product->name,
                        'price' => $product->unit_price,
                        'quantity' => 1,
                        'image' => $product->image
                    ];
                } else {
                    $cart[$id] = [
                        'id' => $id,
                        'name' => $product->name,
                        'price' => $product->promotion_price,
                        'quantity' => 1,
                        'image' => $product->image
                    ];
                }
                $product->discount = $product->discount - 1;
                if($product->discount < 0) {
                    return response()->json([
                        'code' => 300,
                        'message' => 'success'
                    ], 200);
                }
            }
        } else {
            return response()->json([
                'code' => 300,
                'message' => 'success'
            ], 200);
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function history()
    {
        $data = Customer::where('email', Auth::user()->email)->join('bills', 'customers.id', '=', 'bills.customer_id')->get();
        return view('home.history', compact('data'));
    }

    public function historyDetail($id)
    {
        $data = BillDetail::where('bill_id', $id)->join('products', 'products.id', '=', 'product_id')->get();

        return view('home.historyDetail', compact('data'));
    }
    public function search(Request $request){
        $search = $request->input('searchP');
        $data = Product::where('name', "LIKE", "%" . $search . "%")->get();

        return view('home.search',compact('data'));
    }
}
