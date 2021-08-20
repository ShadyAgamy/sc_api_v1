<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_methods = [
            ['name' => 'Debit/Credit Card', 'status' => 1],
            ['name' => 'Apple Pay', 'status' => 1],
            ['name' => 'PayPal', 'status' => 1],
            ['name' => 'Google Pay', 'status' => 1],
        ];
        foreach ($payment_methods as $p) {
            PaymentMethod::create([
                'name' => $p['name'],
                'status' => $p['status']
            ]);
        }
    }
}
