<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD

class Administrador extends Model
{
    use HasFactory;
=======
>>>>>>> dev
=======
>>>>>>> 1ce2dac7168a26586f70cf058c9f4ca69196c6ad
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Administrador extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'estado'
    ];

    protected $hidden = [
        'password',
        'recordar_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 256b4b0beba01b924d780852abea9ed33b20bbd9
>>>>>>> dev
=======
>>>>>>> 1ce2dac7168a26586f70cf058c9f4ca69196c6ad
}
