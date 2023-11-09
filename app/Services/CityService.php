<?php

namespace App\Services;

use App\Models\City;
use http\Env\Response;

class CityService
{
    public function create($countyId, $name): City
    {
        $city = new City;
        $city->county_id = $countyId;
        $city->name = $name;
        $city->save();

        return $city;
    }

    public function update($id, $name): void
    {
        $city = City::find($id);
        $city->name = $name;
        $city->save();
    }

    public function delete($id): void
    {
        $city = City::find($id);
        $city->delete();
    }

}
