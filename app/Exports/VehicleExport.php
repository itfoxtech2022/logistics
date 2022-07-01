<?php

namespace App\Exports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\WithHeadings;    
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class VehicleExport implements FromCollection,WithHeadings,ShouldAutoSize,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vehicle::select('id','vehicle_name','vehicle_number','vehicle_model','vehicle_type','vehicle_total_instalment_cost')->orderBy('vehicle_name')->get();
    }

    public function map($data): array
    {
        return[
        $data->id,
        $data->vehicle_name,
        $data->vehicle_number,
        $data->vehicle_model,
        $data->vehicle_type,
        $data->vehicle_total_instalment_cost
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Vehicle Name',
            'Vehicle Number',
            'Vehicle Model',
            'Vehicle Type',
            'Vehicle Total Instalment cost'
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}


