<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    protected $table = 'akun';
    public $timestamps = false;
    protected $primaryKey = 'id_akun';
    protected $fillable = [
        'id_akun', 'nama', 'nik',
        'email',
        'password',
        'nomor_telepon',
        'role',
        'otp', 'status_verif'
    ];



    public static function search($query)
    {
        return self::where('email', 'like', '%' . $query . '%')
            ->orWhere('nama', 'like', '%' . $query . '%')
            ->get();
    }
}
