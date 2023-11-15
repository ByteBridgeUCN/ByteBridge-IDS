<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {

    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'travelId',
        'userId',
        'travelDate',
        'purchaseDate',
        'purchasedSeats',
        'price',
        'ticketCode',
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class, 'travelId');
    }
}
