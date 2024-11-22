<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

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
        return $this->locations->map(function ($location) {
            return [
                'Name' => $location->name,
                'Description' => $location->description,
                'Municipality' => $location->municipality,
                'Number of Cots' => $location->number_of_cots,
                'Size of Cots' => $location->size_of_cots,
                'Date of Sighting' => $location->date_of_sighting, // Add this field
                'Time of Sighting' => $location->time_of_sighting, // Add this field
                'Latitude' => $location->latitude, // Add this field
                'Longitude' => $location->longitude, // Add this field
                'Activity Type' => $location->activity_type, // Add this field
                'Observer Category' => $location->observer_category, // Add this field
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
            'Date of Sighting',
            'Time of Sighting',
            'Latitude',
            'Longitude',
            'Activity Type',
            'Observer Category',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Apply bold styling to the header row
        $sheet->getStyle('A1:K1')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A1:K1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        
        // Apply background color to header row
        $sheet->getStyle('A1:K1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);

        // Add borders to all cells containing data
        $sheet->getStyle('A2:K' . (count($this->locations) + 1))
            ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Set alignment for all data cells
        $sheet->getStyle('A2:K' . (count($this->locations) + 1))
            ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Adjust column width for better visibility
        foreach (range('A', 'K') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        return [];
    }
}
