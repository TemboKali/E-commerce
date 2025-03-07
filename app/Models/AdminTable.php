<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class AdminTable extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;

    protected $table = 'admin_tables';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'admin_role_id',
        'password',
        'remember_token',
    ];
    use HasFactory;
}
