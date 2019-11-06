<?php
namespace App\Repositories\Interfaces;
interface pagesInterface
{
    public function newPage($baslik,$keywordsd,$description,$sira);
    public function getPageById($id);
    public function fetchPage();
    public function editPageById($id,$baslik,$keywords,$description,$sira);
    public function deletePageById($id);
}
