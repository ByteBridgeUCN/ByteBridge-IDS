<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model {

    public $timestamps = false;

    use HasFactory;

    protected $table = 'travels';

    protected $fillable = [
        'originId',
        'destinationId',
        'totalSeats',
        'baseRate'
    ];

}
