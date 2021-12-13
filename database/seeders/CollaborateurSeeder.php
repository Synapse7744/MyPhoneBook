<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collaborateur;

class CollaborateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collaborateur::factory()->count(50)->create();
    }
}
