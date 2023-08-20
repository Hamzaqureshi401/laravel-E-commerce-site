<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentOptionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'paypal_enabled' => true,
            'payoneer_enabled' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
