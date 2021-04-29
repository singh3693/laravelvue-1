<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=9; $i>0; $i--) {
            DB::table('contacts')->insert([
                'name'=>Str::random(10),
                'email'=>Str::random(10).'@gmail.com',
                'address'=>Str::random(10)
            ]);
        }
    }
}
