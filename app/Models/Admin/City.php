<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

     protected $table = 'tbl_tinhthanhpho';
     protected $primaryKey = 'matp';
     protected $fillable = [
         'name',
         'type'
     ];
}
