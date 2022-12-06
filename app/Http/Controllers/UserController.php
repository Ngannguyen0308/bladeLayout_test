<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function Login(Request $request){
        $login = [
            'email'=> $request->input('email'),
            'password'=>$request->input('pw')

        ];
        if(Auth::attempt($login)){
            $user = Auth::user();
            Session::put('user', $user);
            echo '
                <script>
                    alert("Dang nhap thanh cong");
                    window.location.assign("trangchu");
                </script>';
        }else{
            echo '
                <script>
                    alert("Dang nhap that bai");
                    window.location.assign("login");
                </script>';
        }
    }

    public function Logout(){
        Session::forget('user');
        Session::forget('cart');
        return redirect('/trangchu');

    }

    public function Register(Request $request){
        $input = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'passsword'=>'required',
            'c_password'=>'required|same:password'
        ]);
        $input['password']= bcrypt($input['password']);
        User::created($input);
        echo '
            <script>
                alert("Dang ky thanh cong. Vui long dang nhap");
                window.location.assign("login")
            </script>
        ';


    }
}
