<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role' => 'admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['role' => 'user', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
