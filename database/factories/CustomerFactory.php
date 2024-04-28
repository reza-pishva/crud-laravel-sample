<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Firstname'=>'John', 
            'Lastname'=>'Major',
            'DateOfBirth'=>'2004-02-02',  
            'BankAccountNumber'=>'123456789',  
            'PhoneNumber'=>'0201253678',
            'Email'=>'rpishva100@gmail.com',    
        ];
    }
}
