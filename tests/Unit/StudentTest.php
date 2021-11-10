<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Programme;

class StudentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_is_course_available()
    {
        // $totalProgramme = Programme::all()->pluck('programme_id');

        // // for ($i=0;$i<count($totalProgramme);$i++){
        // //     $this->assertGreaterThan(0,Programme::find($totalProgramme[$i])->courses->count());
        // // }

        foreach (Programme::all() as $programme) {
            $this->assertGreaterThan(0,$programme->courses->count());
        }     
    }
}
