<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commands extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'statut_id'
    ];

    public function command_products()
    {
        return $this->belongsToMany(Products::class, 'commands_products', 'product_id', 'command_id')
                    ->withPivot('quantity');
    }

    public function statut()
    {
        return $this->hasMany(Statut::class, 'id', 'statut_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return (new Carbon($value))->diffForHumans();
    }
}
