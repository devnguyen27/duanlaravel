<?php


namespace App\Repositories\Blog;

use App\Http\Requests\Blog;
use App\Http\Requests\BlogEdit;
use Carbon\Carbon;
use App\Models\Admin\BlogModel;
use App\Models\Admin\DanhMucModel;
use App\Repositories\BaseRepository;
use Illuminate\Cache\RateLimiting\Limit;

class BlogRepository extends BaseRepository implements BlogReponsitoryinterface
{
    protected $model;

    public function getModel()
    {
        return BlogModel::class;
    }

    public function getBlog()
    {
        return $this->model->select('blog.*', 'danhmuc.name AS danhmuc' )
            ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function getLastWeek1()
    {
        $datenow = Carbon::now('Asia/Ho_Chi_Minh');
        $date =  Carbon::now('Asia/Ho_Chi_Minh')->subDays(7);
        return $this->model->select('blog.*', 'danhmuc.name AS danhmuc' )
        ->whereDate('blog.created_at','>=', $date->toDateString())
        ->whereDate('blog.created_at','<', $datenow->toDateString())
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->limit(1)
        ->get();
    }
    public function getLastWeek2()
    {
        $datenow = Carbon::now('Asia/Ho_Chi_Minh');
        $date =  Carbon::now('Asia/Ho_Chi_Minh')->subDays(7);
        return $this->model->select('blog.*', 'danhmuc.name AS danhmuc' )
        ->whereDate('blog.created_at','>=', $date->toDateString())
        ->whereDate('blog.created_at','<', $datenow->toDateString())
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->offset(1)->limit(4)
        ->get();
    }
    public function getBlogmenu()
    {
        return $this->model->limit(3)->orderBy('created_at', 'DESC')
        ->where('blog.trangthai', '=', 1)
        ->orderBy('created_at', 'DESC')
        ->get();
    }
    public function getBlog1()
    {
        return $this->model->select('blog.*','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->limit(1)->orderBy('created_at', 'DESC')->get();
    }
    public function getBlog2()
    {
        return $this->model->select('blog.*','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->offset(1)->limit(4)->orderBy('created_at', 'DESC')->get();
    }
    public function getBlognew()
    {
        return $this->model->select('blog.*', 'danhmuc.name AS danhmuc' )
            ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
            ->offset(1)->limit(2)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
    public function editBlog($slug)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.id AS iddmm','danhmuc.name AS danhmuc')
            ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
            ->where('blog.slug','=', $slug)
            ->get();
    }
    public function getblogbyiddm($id)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('blog.iddm', '=',$id)
        ->get();

    }
    public function getblogbyiddm2($id)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('blog.iddm', '=',$id)->limit(3)->orderBy('id', 'DESC')
        ->get();
        
    }
    public function getblogbyiddm3($id)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('blog.iddm','=', $id)->limit(4)
        ->get();   
    }
    public function updateView($slug)
    {
        $this->model->where('slug','=',$slug)
        ->increment('luotxem');
    }

    public function getblogbyView()
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->limit(3)->orderBy('luotxem', 'DESC')
        ->get();
        
    }
    public function getblogbyxuhuong()
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->limit(4)->orderBy('luotxem', 'DESC')
        ->get();
        
    }
    public function getBlogByIdDanhmuc($iddanhmuc, $skip, $take) 
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('blog.iddm', '=',$iddanhmuc)->skip($skip)->take($take)->orderBy('id', 'DESC')
        ->get();   
    }
}
