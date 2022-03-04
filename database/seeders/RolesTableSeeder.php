<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'name' => 'Nouveau',
            'description' => 'Role par defaut',
            'is_admin' => 0,
        ]);
        Roles::create([
            'name' => 'Modérateur',
            'description' => 'Modérateur YCraft',
            'is_admin' => 0,
        ]);
        Roles::create([
            'name' => 'Administrateur',
            'description' => 'Administrateur Ycraft',
            'is_admin' => 1,
        ]);
    }
}
