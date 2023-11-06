<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model {

    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'userId',
        'roleId'
    ];

}
