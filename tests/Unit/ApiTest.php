<?php

namespace Tests\Unit;

use App\Models\Service;
use App\Models\Vacation;
use App\Models\Worker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_workers(): void
    {
        $response = $this->get('/api/workers');
        $response->assertStatus(200);
        $response->assertJsonIsArray('data');
        $response->assertJsonCount(Worker::count(), 'data');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'age',
                    'created_at',
                    'updated_at',
                ]
            ]
        ]);

        $workers = $response->json('data');
        $this->assertArrayHasKey('name', $workers[0]);
        $this->assertIsString($workers[0]['name']);
        $this->assertArrayHasKey('age', $workers[0]);
        $this->assertIsNumeric($workers[0]['age']);
    }

    public function test_api_services()
    {
        $response = $this->get('/api/services');
        $response->assertStatus(200);
        $response->assertJsonIsArray('data');
        $response->assertJsonCount(Service::count(), 'data');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'price',
                    'duration',
                    'created_at',
                    'updated_at',
                ]
            ]
        ]);

        $services = $response->json('data');
        $this->assertArrayHasKey('name', $services[0]);
        $this->assertIsString($services[0]['name']);
        $this->assertArrayHasKey('price', $services[0]);
        $this->assertIsNumeric($services[0]['price']);
        $this->assertArrayHasKey('duration', $services[0]);
        $this->assertIsNumeric($services[0]['duration']);
    }

    public function test_api_vacations()
    {
        $response = $this->get('/api/vacations');
        $response->assertStatus(200);
        $response->assertJsonIsArray('data');
        $response->assertJsonCount(Vacation::count(), 'data');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'worker_id',
                    'start_date',
                    'days'
                ]
            ]
        ]);

        $vacations = $response->json('data');



        $this->assertArrayHasKey('worker_id', $vacations[0]);
        $this->assertArrayHasKey('days', $vacations[0]);
        $this->assertIsNumeric($vacations[0]['days']);

        foreach ($vacations as $vacation) {
            $this->assertDatabaseHas('workers', ['id' => $vacation['worker_id']]);
        }
    }
}
