<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServicesPacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services_packs')->insert([
            'name' => '2 Locations',
            'price' => 1000,
            'description' => 'Primer registro',
            'status' => 1
        ]);
        DB::table('services_packs')->insert([
            'name' => '3 Locations',
            'price' => 3000,
            'description' => 'Segundo registro',
            'status' => 1
        ]);
    }
}
