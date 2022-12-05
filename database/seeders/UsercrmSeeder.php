<?php

namespace Database\Seeders;

use App\Models\Usercrm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsercrmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usercrm::factory()->count(5)->create();
    }
}
