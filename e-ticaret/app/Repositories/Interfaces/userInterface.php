<?php
namespace App\Repositories\Interfaces;
interface userInterface
{
    public function newUser($adSoyad,$email,$sifre,$activationCode);
    public function newAdmin($adSoyad,$email,$sifre,$activationCode);
    public function adminLogin($email,$sifre);
}
