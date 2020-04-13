<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Persona::class, 1)
        ->create()
        ->each(function ($u) {
             $u->users()->save(factory(App\User::class)->make());
         });
           
            
    }
}
