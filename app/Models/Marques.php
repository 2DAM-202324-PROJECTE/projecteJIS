<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marques extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'logo_ref'];


    public function products(): HasMany
    {
        return $this->hasMany(Products::class, 'marca_id');
    }
}
