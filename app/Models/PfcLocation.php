<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PfcLocation extends Model
{
    use HasFactory;

    public function region()
    {
    	return $this->belongsTo('App\Models\ApiRegion', 'region_id');
    }
}
