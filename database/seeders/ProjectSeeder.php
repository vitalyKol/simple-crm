<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
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
            'user_id' => User::all(['id'])->random(),
            'clients_id' => Client::all(['id'])->random(),
        ]))->create();
    }
}
