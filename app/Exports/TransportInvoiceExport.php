<?php

namespace App\Exports;

use App\Models\Transport;
use Maatwebsite\Excel\Concerns\WithHeadings;    
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransportInvoiceExport  implements FromCollection,WithHeadings,ShouldAutoSize,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transport::orderBy('voucher_number')->get();
    }

    public function map($data): array
    {
        return[
        $data->id,
        $data->voucher_number,
        $data->voucher_type,
        date('d-m-Y', strtotime($data->exp_start_date)),
        $data['vehicle']['vehicle_number'],
        $data['vehicle']['vehicle_type'],
        $data['vehicle']['vehicle_model'],
        $data->dreiver_name, 
        date('d-m-Y', strtotime($data->exp_end_date)),
        $data->code,
        $data->bank_name,
        $data->ac_number,
        $data->ifsc_code,
        $data->branch_name,
        date('d-m-Y', strtotime($data->trip_start_date)),
        $data->trip_type,
        $data->client_name,
        $data->route_name,
        $data->route_distance,
        $data->extimate_budget_fuel_qty,
        $data->remark,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Vch No',
            'Vch type',
            'Vch Date',
            'Truck No',
            'Type', 
            'Model',
            'Driver',
            'DL Expire',
            'Code', 
            'Bank Name',
            'Account No',  
            'IFSC code',   
            'Branch Name',   
            'Trip Date',  
            'Trip Type',   	
            'Client Name',  
            'Route Name',  
            'KM',   
            'Bugt Fuel Qty',
            'Remark'
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

