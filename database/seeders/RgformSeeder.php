<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rgform;

class RgformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rgform::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0;$i<5;$i++){
            Rgform::create([
                'name' =>$faker->name,
                'email'=>$faker->email,
                'password'=>bcrypt($faker->password),
            ]);
        }
    }
}
