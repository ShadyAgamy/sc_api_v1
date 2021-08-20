<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = [
            ['name' => 'main', 'status' => 1],
            ['name' => 'instagram', 'status' => 1],
            ['name' => 'snapchat', 'status' => 1],
            ['name' => 'pinterest', 'status' => 1],
            ['name' => 'tiktok', 'status' => 1],
        ];
        foreach ($platforms as $p) {
            Platform::create([
                'name' => $p['name'],
                'status' => $p['status']
            ]);
        }
    }
}
