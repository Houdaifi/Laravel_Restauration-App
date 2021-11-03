<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $status = ['created', 'inprocess', 'delivered'];

        for ($i=0; $i < 3; $i++) { 
            DB::table('status')->insert([
                'name' => $status[$i],
            ]);
        }
    }
}
