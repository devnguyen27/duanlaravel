<?php


namespace App\Repositories\City;
use App\Repositories\BaseRepository;
class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    protected $model;
    public function getModel(){
        return \App\Models\Admin\City::class;
    }
    // public function modelcity(){
    //     return \App\Models\Admin\City::class;
    // }

}
