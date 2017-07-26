<?php

use Illuminate\Database\Seeder;

class PresenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( App::environment() === 'local' ){
	    	$presenter = factory(App\Presenter::class, 20)->create();
        }
    }
}
