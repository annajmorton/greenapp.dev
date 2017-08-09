<?php

use Illuminate\Database\Seeder;
use App\Footprint;

class FootprintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        
        $anna = new Footprint;
        $ajit = new Footprint;
        $scott = new Footprint;

        $anna->first_name = 'anna';
        $anna->last_name = 'morton';
        $anna->calculated = 43011;

        $ajit->first_name = 'ajit';
        $ajit->last_name = 'naik';
        $ajit->calculated = 22656;

        $scott->first_name = 'scott';
        $scott->last_name = 'farbman';
        $scott->calculated = 15257;

        $anna->save();
        $ajit->save();
        $scott->save();


        // if( App::environment() === 'local' ){
        //     $attendees = 150;
        //     // Create three App\User instances...
        // 	$footprint = factory(App\Footprint::class, $attendees)->create();
        // }
    }
}
