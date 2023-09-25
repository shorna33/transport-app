<?php

namespace App\Models;

use App\Models\User;
use App\Models\Transport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ['product', 'total_distance', 'total_cost', 'user_id', 'transport_id'];

    public function transport() {
        return $this->belongsTo(Transport::class, 'transport_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
