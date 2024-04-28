<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Customer;
use Illuminate\Foundation\Testing\DatabaseTransactions;



//namespace Tests\Feature;
// use Tests\TestCase;

class CustomerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_store_customer()
    {
        $data = [
            'Firstname'=>'reza100',  
            'Lastname'=>'pishva100',
            'DateOfBirth'=>'2004-01-01',  
            'BankAccountNumber'=>'123456789',  
            'PhoneNumber'=>'0201253678',
            'Email'=>'rpishva100@gmail.com',          
        ];
        $response = $this->post('/customers', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('customers', $data);
    }

    public function test_update_customer()
    {
        $data = [
            'Firstname'=>'reza200',  
            'Lastname'=>'pishva200',
            'DateOfBirth'=>'2004-01-01',  
            'BankAccountNumber'=>'12345678910',  
            'PhoneNumber'=>'0201253678',
            'Email'=>'rpishva200@gmail.com',          
        ];
        $response = Customer::factory()->create();
        $response = $this->put('/customers/'.$response->id, $data);
        $response->assertStatus(200);
    }
    public function test_remove_customer()
    {
        $response = Customer::factory()->create();
        $response = $this->delete('/customers/'.$response->id);
        $response->assertStatus(200);
    }
    public function test_index_customer()
    {
        $response = Customer::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_show_customer()
    {
        $response = Customer::factory()->create();
        $response = $this->get('/customers/'.$response->id);
        $response->assertStatus(200);
    }
}
