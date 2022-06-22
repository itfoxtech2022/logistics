<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleInstalment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function VehicleData()
    {
    return $this->hasOne('App\Models\Vehicle','id','vehicle_id');
    }

}
