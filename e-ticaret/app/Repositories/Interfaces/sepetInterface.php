<?php
namespace App\Repositories\Interfaces;
interface sepetInterface
{
    public function create($kullaniciID);
    public function fetchAllById($kullaniciID);
    public function delete($id);
}
