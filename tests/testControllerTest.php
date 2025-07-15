<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Customers;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_testing_creation()
    {
        // create a fake organization
        $user = User::factory()->create();
        $this->actingAs($user);
        //Post request to create a new book
        $response = $this->post('/customer', [
            'customer_name' => 'New name',
            'phone' => '0812',
            'address' => 'New address',
        ]);
        //Check if the book was created
        $response->assertRedirect('/customer');
        $this->assertDatabaseHas('customers', [
            'customer_name' => 'New Name',
            'phone' => '0812',
            'address' => 'New address',
        ]);

        $response->assertSessionHasErrors(['phone' => 'Your phone number has been used']);
    }

    public function test_testing_update()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $customer = Customers::factory()->create([
            'customer_name' => 'New Name',
            'phone' => '0812',
            'address' => 'New address',
        ]);
    }
}