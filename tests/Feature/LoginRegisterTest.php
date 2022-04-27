<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginRegisterTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_can_route_index_login()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->get('/index');
        // $response = $this->get('/index');

        $response->assertStatus(200);
    }

    public function test_can_see_form_login()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Login');
    }

    public function test_can_login_register()
    {
        $fakerEmail = $this->faker->email;
        $user = User::factory()->create([
            'name'     => 'Rey',
            'phone'    => '0812341333',
            'email'    => $fakerEmail,
            'password' => bcrypt('secret'),
        ]);

        $response = $this->get('/login');
        $response = $this->actingAs($user)->get('/login');
        $this->assertAuthenticatedAs($user);
        $response = $this->get('/dashboard');
        $response->assertSee('Welcome');
    }
}
