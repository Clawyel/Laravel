<?php
namespace App\Repositories\Interfaces;
interface sepetUrunInterface
{
    public function create($sepetID,$urunID,$adet);
    public function fetchAllById($sepetID);
    public function delete($sepetID,$urunID);
    public function update($sepetID,$urunID,$adet);
}
