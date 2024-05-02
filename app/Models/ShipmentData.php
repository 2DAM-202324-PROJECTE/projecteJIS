<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentData extends Model
{
    protected $fillable = ['user_id', 'name', 'email', 'address', 'city', 'state', 'postal_code', 'country'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
