<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'amount',
        'address',
        'price',
        'priveIVA'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
