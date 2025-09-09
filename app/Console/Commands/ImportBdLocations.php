<?php

namespace App\Console\Commands;

use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportBdLocations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-bd-locations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Divisions, Districts, and Upazilas from a public API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting location data import...');

        // Step 1: Import Divisions
        $this->info('Importing Divisions...');
        $divisionsResponse = Http::get('https://bdapi.vercel.app/api/v.1/division');
        $divisions = $divisionsResponse->json()['data'];
        foreach ($divisions as $divisionData) {
            Division::firstOrCreate(
                ['id' => $divisionData['id']],
                [
                    'name' => $divisionData['name'],
                    'bn_name' => $divisionData['bn_name'],
                    'url' => $divisionData['url'],
                ]
            );
        }

        // Step 2: Import Districts
        $this->info('Importing Districts...');
        $districtsResponse = Http::get('https://bdapi.vercel.app/api/v.1/district');
        $districts = $districtsResponse->json()['data'];
        foreach ($districts as $districtData) {
            District::firstOrCreate(
                ['id' => $districtData['id']],
                [
                    'name' => $districtData['name'],
                    'bn_name' => $districtData['bn_name'],
                    'division_id' => $districtData['division_id'],
                    'lat' => $districtData['lat'],
                    'lon' => $districtData['lon'],
                    'url' => $districtData['url'],
                ]
            );
        }

        // Step 3: Import Upazilas
        $this->info('Importing Upazilas...');
        $upazilasResponse = Http::get('https://bdapi.vercel.app/api/v.1/upazilla');
        $upazilas = $upazilasResponse->json()['data'];
        foreach ($upazilas as $upazilaData) {
            Upazila::firstOrCreate(
                ['id' => $upazilaData['id']],
                [
                    'name' => $upazilaData['name'],
                    'bn_name' => $upazilaData['bn_name'],
                    'district_id' => $upazilaData['district_id'],
                    'url' => $upazilaData['url'],
                ]
            );
        }

        // Step 4: Import Unions
        $this->info('Importing Unions...');
        $unionsResponse = Http::get('https://bdapi.vercel.app/api/v.1/union');
        $unions = $unionsResponse->json()['data'];
        foreach ($unions as $unionData) {
            Union::firstOrCreate(
                ['id' => $unionData['id']],
                [
                    'name' => $unionData['name'],
                    'name_bn' => $unionData['bn_name'],
                    'upazila_id' => $unionData['upazilla_id'],
                    'url' => $unionData['url'],
                ]
            );
        }

        $this->info('Location data import complete!');
    }
}
