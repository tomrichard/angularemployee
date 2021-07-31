<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

    	$data 	= [
    		[
    			'uuid' => 'GroupAAA',
    			'text' => 'Group AAA',
    		], 
    		[
    			'uuid' => 'GroupBBB',
    			'text' => 'Group BBB',
    		], 
    		[
    			'uuid' => 'GroupCCC',
    			'text' => 'Group CCC',
    		], 
    		[
    			'uuid' => 'GroupDDD',
    			'text' => 'Group DDD',
    		], 
    		[
    			'uuid' => 'GroupEEE',
    			'text' => 'Group EEE',
    		], 
    		[
    			'uuid' => 'GroupFFF',
    			'text' => 'Group FFF',
    		], 
    		[
    			'uuid' => 'GroupGGG',
    			'text' => 'Group GGG',
    		], 
    		[
    			'uuid' => 'GroupHHH',
    			'text' => 'Group HHH',
    		], 
    		[
    			'uuid' => 'GroupIII',
    			'text' => 'Group III',
    		], 
    		[
    			'uuid' => 'GroupJJJ',
    			'text' => 'Group JJJ',
    		]
    	];

    	$group = DB::table('employee_group')->insert($data);

    	$faker = Faker::create();

    	for($i=0;$i<100;$i++) {

    	}


    	

    }
}
