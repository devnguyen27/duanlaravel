<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
    	'name', 'type','matp'
    ];
    protected $primaryKey = 'maqh';
 	protected $table = 'tbl_quanhuyen';
}
