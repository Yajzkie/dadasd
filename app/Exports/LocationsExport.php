<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LocationsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $locations;

    public function __construct($locations)
    {
        $this->locations = $locations;
    }

    // The data to export
    public function collection()
    {
        // Format the data to include only the necessary columns
        return $this->locations->map(function ($location) {
            return [
                'Name' => $location->name,
                'Description' => $location->description,
                'Municipality' => $location->municipality,
                'Number of Cots' => $location->number_of_cots,
                'Size of Cots' => $location->size_of_cots,
            ];
        });
    }

    // Add headings to the Excel sheet
    public function headings(): array
    {
        return [
            'Name',
            'Description',
            'Municipality',
            'Number of Cots',
            'Size of Cots',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Apply bold styling to the header row
            1 => ['font' => ['bold' => true]],
        ];
    }
}


