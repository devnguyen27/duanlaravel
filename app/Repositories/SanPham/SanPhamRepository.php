<?php


namespace App\Repositories\SanPham;

use App\Repositories\BaseRepository;
use App\Repositories\SanPham\SanPhamRepositoryInterface;
class SanPhamRepository extends BaseRepository implements SanPhamRepositoryInterface
{
    public function getModel(){
        return \App\Models\Admin\SanPham::class;
    }

}
