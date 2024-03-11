<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\SimpleExcel\SimpleExcelReader;
use App\Models\Facility;
use App\Models\Venue;

class ImportExcelData extends Command
{
    protected $signature = 'import:excel {path}';
    protected $description = 'Imports data from an Excel file into the database';

    public function handle()
    {
        $path = $this->argument('path');

        SimpleExcelReader::create($path)->getRows()
            ->each(function(array $row) {
                $facility = Facility::firstOrCreate([
                    'name' => $row['Bezeichnung der Sportstätte'],
                ], [
                    'location' => $row['Ort'], // Example of combining fields for location
                    'longitude' => $row['Laengengrad'],
                    'latitude' => $row['Breitengrad'],
                ]);

                Venue::create([
                    'facility_id' => $facility->id,
                    'name' => $row['Anlagenbez'],
                    'properties' => json_encode([
                        // Add any other properties you need from the row
                    ]),
                ]);
            });

        $this->info('Excel data imported successfully!');
    }
}
