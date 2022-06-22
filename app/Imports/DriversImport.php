<?php

namespace App\Imports;

use App\Models\Driver;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DriversImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function rules(): array
    {
     return [
         'driver_name'    => 'required|max:35',
         'driver_phone'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10', 
     ];
 
     }
 
     public function customValidationMessages()
     {
     return [
            #Max Lenght Validation
            'driver_name.required'   => 'Driver name must not be empty!',
            'driver_name.max'        => 'The maximun length of The Driver name must not exceed :max',

            #Max Length with Contact Numeric   
            'driver_phone.required'  => 'Driver contact must not be empty!',
            'driver_phone.regex'     => 'Incorrect format of Driver Contact',
        ];
    }

    public function model(array $row)
    {
        return new Driver([
            'driver_name'     => $row['driver_name'],
            'driver_phone'    => $row['driver_phone'],
        ]);
    }
}