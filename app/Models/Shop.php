<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $primaryKey = 'shopId';
    protected $fillable = [
        'sellerId', 'shopName', 'shopAddress', 'shopContact'
    ];

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
}
