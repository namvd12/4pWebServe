<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'user'
        ]);
    }
}