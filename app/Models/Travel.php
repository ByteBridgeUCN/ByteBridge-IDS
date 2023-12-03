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

    public function originCity()
    {
        return $this->belongsTo(City::class, 'originId');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destinationId');
    }

}
