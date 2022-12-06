<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Usercrm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory()->count(5)->state(new Sequence(
            fn ($sequence) => ['user_id' => Usercrm::all()->random()],
        ))->create();
    }
}
