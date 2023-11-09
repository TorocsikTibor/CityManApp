<?php

namespace App\Services;

use App\Models\City;


class CityService
{
    public function create(int $countyId, string $name): City
    {
        $city = new City;
        $city->county_id = $countyId;
        $city->name = $name;
        $city->save();

        return $city;
    }

    public function update(int $id, string $name): void
    {
        $city = City::findOrFail($id);
        $city->name = $name;
        $city->save();
    }

    public function delete(int $id): void
    {
        City::destroy($id);
    }

}
