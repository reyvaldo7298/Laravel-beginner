<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Employee;

class employeCRUDTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_insert_user_api()
    {
        $user = User::factory()->create();
        $data = [
            'name' => $this->faker->firstNameMale,
            'phone' => '8821333333',
            'email' => $this->faker->email,
            'password' => $this->faker->md5,
        ];

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/');
        $response = $this->json('POST', 'api/user', $data);

        $response->assertStatus(200);
    }

    public function test_update_user_api()
    {
        $user = User::factory()->create();
        $data = [
            'name' => 'Roland',
            'phone' => '8821333333',
            'email' => $this->faker->email,
            'password' => $this->faker->md5,
        ];

        $response = $this->actingAs($user)
                         ->get('/');
        $response = $this->json('PUT', 'api/user/3', $data);

        $response->assertStatus(200);
    }

    public function test_delete_user_api()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('/');
        $response = $this->json('DELETE', 'api/user/193');
        $response = $this->actingAs($user)
                         ->get('/');
        $response->assertStatus(200);
    }
}
