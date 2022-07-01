<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transport extends Model
{
    use SoftDeletes;
    use HasFactory;

    
    public function transportDetail(){
       return $this->hasMany('App\Models\TransportDetail','transportation_id');
    }

    public function vehicle()
    {
    return $this->hasOne('App\Models\Vehicle','id','vehicle_id')->select('id','vehicle_name','vehicle_number','vehicle_model','vehicle_type');
    }
}
