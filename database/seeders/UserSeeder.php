<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Josimar Jauregui',
            'email'=>'josimar@admin.com',
            'password'=>bcrypt('josimar.admin'),
        ]);
        User::factory(99)->create();
    }
}
