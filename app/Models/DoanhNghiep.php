<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoanhNghiep extends Model
{
    //
    protected $fillable = [
        'mst', 'ten_dn', 'dia_chi','dt_dn','email','n_daidien','so_tien','loai_goi','so_nam','user_id','user_name','trang_thai'
    ];
}
