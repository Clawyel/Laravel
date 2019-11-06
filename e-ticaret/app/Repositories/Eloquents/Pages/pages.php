<?php


namespace App\Repositories\Eloquents\Pages;
use App\Repositories\Interfaces\pagesInterface;
use App\Entities\page as page;

class pages implements pagesInterface
{
    public function newPage($baslik,$keywords,$description,$sira)
    {
        $page = new page();
        $page->baslik = $baslik;
        $page->sira=$sira;
        $page->keywords = $keywords;
        $page->description=$description;
        return $page->save();
    }
    public function getPageById($id)
    {
        $page = new page();
        return $page->findOrFail($id);
    }
    public function fetchPage()
    {
        //$a = ~\App\Entities\page::all();
       // echo $a;

        $page = page::all();
        return page::all();
    }
    public function editPageById($id,$baslik,$keywords,$description,$sira)
    {
        $page = page::find($id);
        $page->baslik = $baslik;
        $page->sira = $sira;
        $page->keywords = $keywords;
        $page->description = $description;
        return $page->save();
    }
    public function deletePageById($id)
    {
        return page::findOrFail($id)->delete();
    }
}
