<?php


namespace App\Repositories\Eloquents\User;
use App\Repositories\Interfaces\userInterface;
use App\Entities\User as userModel;

class user implements userInterface
{
    public function newAdmin($adSoyad, $email, $sifre, $activationCode)
    {
        $user = new userModel();
        $user->name = $adSoyad;
        $user->email = $email;
        $user->password = $sifre;
        $user->activationcode = $activationCode;
        $user->save();
        auth()->login($user);
    }
    public function adminLogin($email, $sifre)
    {

    }

    public function newUser($adSoyad, $email, $sifre, $activationCode)
    {
        $user = new userModel();
        $user->name = $adSoyad;
        $user->email = $email;
        $user->password = $sifre;
        $user->activationcode = $activationCode;
        $user->save();
        auth()->login($user);
    }
}
