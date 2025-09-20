<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Bank::factory()->count(3)->create();
        $payments = [
            [
                'payment_method' => 'Cash',
                'bank_id' => null
            ],
            [
                'payment_method' => 'Online',
                'bank_id' => 1
            ],
            [
                'payment_method' => 'Online',
                'bank_id' => 2
            ],
            [
                'payment_method' => 'Online',
                'bank_id' => 3
            ],
        ];

        foreach($payments as $pay){
            Payment::create($pay);
        };
    }
}
