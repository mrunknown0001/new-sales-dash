<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PfcProduct extends Model
{
    use HasFactory;

    public function product_type()
    {
    	return $this->belongsTo('App\Models\PfcProductType', 'product_type_id');
    }
}
