<?php

use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Person::class, 50)->create()->each(function ($p) {
	        $p->users()->save(factory(App\User::class)->make());
	    });
    }
}
