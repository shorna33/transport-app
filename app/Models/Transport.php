<?php

namespace App\Models;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'cost_per_km'];

    public function shipment() {
        return $this->hasMany(Shipment::class, 'transport_id');
    }
}
