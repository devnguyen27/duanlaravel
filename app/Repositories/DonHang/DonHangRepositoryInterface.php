<?php


namespace App\Repositories\DonHang;


interface DonHangRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create($attributes = []);

    public function update($id,$attributes = []);

    public function delete($id);

    public function active_donhang($id);
    public function active_donhang1($id);
    public function active_donhang2($id);
    public function active_donhang3($id);
}