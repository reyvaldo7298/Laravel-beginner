<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RelationEmployeeTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_data()
    {
        $user = User::factory()->create();
        $data = [
            'name' => $this->faker->firstNameMale,
            'phone' => '8821333333',
            'email' => $this->faker->email,
            'password' => $this->faker->md5,
        ];

        $response = $this->actingAs($user)
                         ->get('/data-pegawai');

        $response->assertStatus(200);
    }
    
    public function test_can_input_data()
    {
        $user = User::factory()->create();
        $data = [
            'name' => $this->faker->firstNameMale,
            'phone' => '8821333333',
            'email' => $this->faker->email,
            'password' => $this->faker->md5,
        ];

        $response = $this->actingAs($user)
                         ->get('/input-pegawai');

        Storage::fake('avatar');
        $file = UploadedFile::fake()->image('avatar.jpg', 100, 200)->size(100);
        $data = [
            'image' => $file,
            'nama' => $this->faker->firstNameMale,
            'jabatan' => '1',
            'alamat' => $this->faker->address,
            'image_id' => $file,
        ];

        $response = $this->post('/store-pegawai',$data);
        $response->assertStatus(302);
    }

    public function test_can_update_data()
    {
        $user = User::factory()->create();
        $data = [
            'name' => $this->faker->firstNameMale,
            'phone' => '8821333333',
            'email' => $this->faker->email,
            'password' => $this->faker->md5,
        ];

        $response = $this->actingAs($user)
                         ->get('/input-pegawai');

        Storage::fake('avatar');
        $file = UploadedFile::fake()->image('avatar.jpg', 100, 200)->size(100);
        $data = [
            'id' => '26',
            'image' => $file,
            'nama' => $this->faker->firstNameMale,
            'jabatan' => '1',
            'alamat' => $this->faker->address,
            'image_id' => $file,
        ];

        $response = $this->post('/update-pegawai',$data);
        $response->assertStatus(302);
    }

    public function test_can_delete_data(Type $var = null)
    {
        $user = User::factory()->create();
        $data = [
            'name' => $this->faker->firstNameMale,
            'phone' => '8821333333',
            'email' => $this->faker->email,
            'password' => $this->faker->md5,
        ];

        $response = $this->actingAs($user)
                         ->get('/input-pegawai');

        $response = $this->get('/hapus-pegawai/25',$data);
        $response->assertStatus(302);
    }
}
