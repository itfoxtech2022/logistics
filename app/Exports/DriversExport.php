<?php

namespace App\Exports;

use App\Models\Driver;
use Maatwebsite\Excel\Concerns\WithHeadings;    
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class DriversExport implements FromCollection,WithHeadings,ShouldAutoSize,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Driver::select('id','driver_name','driver_phone')->orderBy('driver_name')->get();
    }

    public function map($data): array
    {
        return[
        $data->id,
        $data->driver_name,
        $data->driver_phone
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Driver Name',
            'Driver Phone Number'
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


