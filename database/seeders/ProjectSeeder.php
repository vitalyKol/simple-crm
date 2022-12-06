<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\Usercrm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory()->count(5)->state(new Sequence(fn($sequence) => [
            'user_id' => Usercrm::all()->random(),
            'clients_id' => Client::all()->random(),
        ]))->create();
    }
}
