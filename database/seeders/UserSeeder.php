<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0;$i<50;$i++){
            User::create([
                'name' =>$faker->name,
                'email'=>$faker->email,
                'password'=>bcrypt($faker->password),
            ]);
        }
    }
}
