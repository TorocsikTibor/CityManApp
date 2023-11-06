<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $counties = [
            ['name' => 'Bács-Kiskun'],
            ['name' => 'Baranya'],
            ['name' => 'Békés'],
            ['name' => 'Borsod-Abaúj-Zemplén'],
            ['name' => 'Csongrád-Csanád'],
            ['name' => 'Fejér'],
            ['name' => 'Győr-Moson-Sopron'],
            ['name' => 'Hajdú-Bihar'],
            ['name' => 'heves'],
            ['name' => 'Jász-Nagykun-Szolnok'],
            ['name' => 'Komáron-Esztergom'],
            ['name' => 'Nógrád'],
            ['name' => 'Pest'],
            ['name' => 'Somogy'],
            ['name' => 'Szabolcs-Szatmár-Bereg'],
            ['name' => 'Tolna'],
            ['name' => 'Vas'],
            ['name' => 'Veszprém'],
            ['name' => 'Zala'],

            ];

        DB::table('counties')->insert($counties);

        DB::table('cities')->insert([
           'name' => "test",
           'county_id' => 1,
        ]);
    }
}
