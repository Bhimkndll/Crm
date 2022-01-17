<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purpose;
class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purpose::create([
            'name'=>'visit only'
        ]);
      
}
    }

