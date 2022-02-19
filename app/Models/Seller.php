<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $primaryKey = 'sellerId';
    protected $fillable = [
        'sellerName', 'sellerEmail', 'sellerContact'
    ];

    public function shop()
    {
        return $this->hasMany('App\Shop');
    }
}
