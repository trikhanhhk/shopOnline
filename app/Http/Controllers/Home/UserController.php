<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use PHPUnit\Framework\MockObject\Stub\Exception;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $check = User::where('email', $request->email)->first();


            if ($check === null) {
                $userCreate = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => hash::make($request->password),
                    'role_id'=>2

                ]);
                DB::commit();
                return redirect()->back()->with(['flag' => 'success', 'message' => 'thanh cong']);
            } else {
                return redirect()->back()->with(['false' => 'danger', 'message' => 'khong thanh cong']);
            }

        } catch (Exception $exception) {
            DB::rollBack();
        }


        return back();
    }

    public function login(Request $request)
    {
        $user_data = array(
            'email' => $request->email,
            'password' => $request->password
        );
        $remember = $request->remember;
        if (Auth::attempt($user_data, $remember)) {
            return redirect('home');
        } else {
            return redirect('home')->with('loginF', 'failed');
        }
//        return back();
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('cart');
        return redirect('home');
    }

    public function updateMoney(Request $request, $uid)
    {
        $todo = User::find($uid);
        $a = (int)$request->money;

        $todo->money = $todo->money + $a;
        if (Hash::check($request->password, $todo->password)) {
            $todo->save();
            return redirect('home');
        } else {
            return redirect('home')->with('moneyF', 'failed');
        }


    }

    public function changePass()
    {
        return view('home.changePass');
    }

    public function returnPass()
    {
        return view('home.returnPass');
    }

    public function postChangePass(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $pass = $user->password;
        if (Hash::check($request->passwordNew, $pass)) {
            return redirect()->back()->with('trung', 'failed');
        } else {
            if (Hash::check($request->password, $pass)) {
                if ($request->passwordNew === $request->re_passwordNew) {
                    $user->password = Hash::make($request->passwordNew);
                    $user->save();
                    return redirect('home')->with('newSucc', 'ok');
                } else {
                    return redirect()->back()->with('newFailed', 'failed');
                }


            } else {
                return redirect()->back()->with('oldFailed', 'failed');
            }
        }
    }

    public function postReturnPass(Request $request)
    {
        $check = User::where('email', $request->email)->first();
        if ($check != null) {
            if ($request->passwordNew === $request->re_passwordNew) {
                $check->password = Hash::make($request->passwordNew);
                $check->save();
                return redirect('home')->with('newSucc', 'ok');
            } else {
                return redirect()->back()->with('newFailed', 'failed');
            }
        } else {
            return redirect()->back()->with('emailFailed', 'failed');
        }


    }
}
