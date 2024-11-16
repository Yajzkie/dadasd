<?php

namespace App\Exports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class LocationsReportExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths
{
    /**
     * Return a collection of locations.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Location::all();
    }

    /**
     * Define the headings for the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Description',
            'Municipality',
            'Number of Cots',
            'Size of Cots',
            'Activity Type',
            'Observer Category',
            'Date of Sighting',
            'Time of Sighting',
        ];
    }

    /**
     * Map the data for export.
     *
     * @param  \App\Models\Location  $location
     * @return array
     */
    public function map($location): array
    {
        return [
            $location->id,
            $location->name,
            $location->description,
            $location->municipality,
            $location->number_of_cots,
            $location->size_of_cots,
            $location->activity_type,
            $location->observer_category,
            $location->date_of_sighting,
            $location->time_of_sighting,
        ];
    }

    /**
     * Define the column widths for the Excel file.
     *
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 5,  // # (ID)
            'B' => 30, // Name
            'C' => 40, // Description
            'D' => 25, // Municipality
            'E' => 20, // Number of Cots
            'F' => 20, // Size of Cots
            'G' => 20, // Activity Type
            'H' => 20, // Observer Category
            'I' => 20, // Date of Sighting
            'J' => 15, // Time of Sighting
        ];
    }
}
