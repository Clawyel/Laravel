<?php
namespace App\Repositories\Interfaces;
interface kategoriInterface
{
    public function create($baslik,$sira);
    public function getById($id);
    public function fetchAll();
    public function update($id,$baslik,$sira);
    public function delete($id);
}
