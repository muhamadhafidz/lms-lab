<?php

use Illuminate\Database\Seeder;

class InstrukturTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for ($i=5; $i <= 15 ; $i++) { 
            DB::table('instruktur')->insert([
                'user_id' => $i,
            ]);
        }
        
    }
}
