<?php
namespace App\Repositories\Interfaces;
interface kitaplarInterface
{
    public function fetchAll();
    public function getById($id);
    public function delete($id);
    public function update($id,$yayineviID,$baslik,$sayfaSayisi); //en son kontrol edilecek
    public function create($yayineviID,$kategoriID,$yazarID,$baslik,$sayfaSayisi);
    public function getByKategori($kategoriID);
    public function getByYayinevi($yayineviID);
    public function getByYazar($yazarID);
    public function getBySayfaSayisi($sayfaSayisi);
    public function getByYayineviYazar($yayineviID);

}
