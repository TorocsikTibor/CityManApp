<?php

namespace Tests\Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;


class CityControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testCityCreate_Successful(): void
    {
        $response = $this->post('/county/city/create', [
            'county_id' => 1,
            'name' => 'test',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('cities', [
            'county_id' => 1,
            'name' => 'test',
        ]);
    }

    public function testCityUpdate_Successful(): void
    {
        $city = City::create(['county_id' => 1, 'name' => 'test']);

        $response = $this->post("/county/city/update/{$city->id}", ['name' => 'test123']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('cities', [
            'id' => $city->id,
            'name' => 'test123',
        ]);
    }

    public function testCityDelete_Successful(): void
    {
        $city = City::create(['county_id' => 1, 'name' => 'test']);

        $response = $this->delete("/county/city/delete/{$city->id}");

        $response->assertStatus(200);
        $this->assertSoftDeleted('cities', ['id' => $city->id]);
    }
}
