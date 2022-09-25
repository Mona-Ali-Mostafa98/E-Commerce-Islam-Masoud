<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        $countries = [
            [
                'country_name' => 'Egypt',
                'country_code' => '+20',
                'calling_code' => 'EG',
                'country_flag' => asset('admin/Flag_of_Egypt.svg.webp') ,
                'maximum_mobile_number' => '12',
            ],
        ];

        foreach ($countries as $key => $value) {
            Country::create($value);
        }
    }
}
