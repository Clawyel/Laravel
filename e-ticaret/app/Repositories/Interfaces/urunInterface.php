<?php
namespace App\Repositories\Interfaces;
interface urunInterface
{
    public function create($baslik,$kategori,$aciklama,$resim,$fiyat,$sira);
    public function getById($id);
    public function getBySlug($slug);
    public function fetchAll();
    public function update($id,$baslik,$kategori,$aciklama,$fiyat,$sira);
    public function delete($id);
    public function resimUpt($id,$resim);
}
