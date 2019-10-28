<?php

namespace App\Http\Controllers;

use App\Entities\kategoriler;
use App\Entities\yazarlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Str;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function getUser()
    {
        $user = Auth::guard('api')->user();
        if(!$user)
        {
            return response()->json(['status' => '401','message' => 'Giriş Yapılmadı']);
        }
        else
        {
            return $user;
        }
    }
    public function loginUser(Request $request)
    {

        $user = User::where('email',$request->email)->first();
        if(Hash::check($request->password,$user->password))
        {
            $user->api_token = Str::random(60);
            $user->save();
            return response()->json([
                'status' => 200,
                'api_token' => $user->api_token,
                'username' => $user->name,
                'email' => $user->email,
                'id' => $user->id
            ]);
        }
        return response()->json([
            'status' => 401,
            'message' => 'Unauthenticated.'
        ]);
    }

    public function registerUser()
    {
        $this->validate(request(),
            [
                "email" => "required",
                "password"=>"required",
                "name" =>"required"]);
        $name= request('name');
        $email= request('email');
        $password= request('password');
        $password = Hash::make($password);
        $ekle = new User;
        $ekle->name=$name;
        $ekle->email=$email;
        $ekle->password=$password;

        $ekle->save();
        if($ekle)
        {
            return response()->json(["status" => "200","message"=> "Kayıt Başarılı, Giriş Yapıp Token Değerinizi Alın."]);
        }
        else
        {
            return response()->json(["status" => "401","message"=> "Kayıt Hatası"]);
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

}
