<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Programme;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Student::truncate(); // to regenerate whole table data
        $faker = \Faker\Factory::create();

        // take all the programme id and put into array
        $list = Programme::all()->pluck('programme_id');

        // create 100 students from different programme
        for ($i=0;$i<100;$i++){
            Student::create([
                'programme_id'=>$faker->randomElement($list),
                'student_id'=> $faker->regexify('20WMD[1-9]{5}'), // condition 20WMD, follow by 5 random numbers
                'name'=>$faker->name,
                'age'=>$faker->numberBetween(19,30),
                'gender'=>$faker->randomElement(['M','F']),
                'class'=>$faker->numberBetween(1,17),
                'CGPA'=>$faker->randomFloat(2,2.0,4.0),
                'address'=>$faker->address,
                'email'=>$faker->email
            ]);
        }
    }
}
