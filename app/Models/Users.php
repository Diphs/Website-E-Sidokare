<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = 'password';
protected $fillable = ['id','name', 'email', 'password', 'role'];

public static function search($query)
    {
        return self::where('email', 'like', '%'.$query.'%')
            ->orWhere('name', 'like', '%'.$query.'%')
            ->get();
    }

}
