<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class TaiKhoan extends Authenticatable
{
    use HasFactory;

    protected $table = 'tai_khoans';
    protected $fillable = [
        'ho_ten',
        'ngay_sinh',
        'email',
        'so_dien_thoai',
        'gioi_tinh',
        'dia_chi',
        'mat_khau',
        'chuc_vu_id',
        'trang_thai',
    ];
    protected $hidden = [
        'mat_khau',
    ];

    public function get_all_tai_khoan(){
        $tai_khoan = DB::table('tai_khoans')->get();

        return $tai_khoan;
    }

    public function update_tai_khoan($data){
        DB::table('tai_khoans')
        ->where('id', $data['id'])
        ->update($data);

    }
}
