<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceTag extends Model
{
    use HasFactory;

    protected $fillable = ['id','price_purchase','price_selling','price_discount'];

}
