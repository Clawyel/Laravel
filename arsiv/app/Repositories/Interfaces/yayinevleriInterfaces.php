<?php
namespace App\Repositories\Interfaces;
interface yayinevleriInterfaces
{
    public function fetchAll();
    public function getById($id);
    public function delete($id);
    public function update($id,$baslik);
    public function create($baslik);
}
