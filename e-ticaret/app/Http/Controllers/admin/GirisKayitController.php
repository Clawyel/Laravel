<?php

namespace App\Http\Controllers\admin;
use App\Repositories\Interfaces\userInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
class GirisKayitController extends Controller
{
    //
    protected $userInterface;
    public function __construct(userInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function kayit()
    {
        $this->validate(request(),
            [
                "name" => "required|min:5|max:60",
                "email" => "required|email|unique:users",
                "password" => "required|confirmed|min:8|max:15"
            ]
        );
        $adSoyad = request('name');
        $email = request('email');
        $password = Hash::make(request('password'));
        $activationCode = Str::random(60);
        $this->userInterface->newAdmin($adSoyad,$email,$password,$activationCode);
        return redirect()->route('panelView');
    }
    public function giris()
    {
        if(request()->isMethod('POST'))
        {
            $this->validate(request(),
                [
                    "email" => "required|email",
                    "password" => "required|min:8|max:15"
                ]
            );
            $credentials = [
                "email" => request()->get('email'),
                "password" => request()->get('password'),
                "yoneticimi" => 1,
            ];

            if(Auth::guard('yonetim')->attempt($credentials))
            {
                return redirect()->route("panelView");
            }
            else
            {
                return back()->withInput()->withErrors(['email'=>"Giriş Hatalı!"]);
            }
        }

        return view('admin.login');
    }

}
