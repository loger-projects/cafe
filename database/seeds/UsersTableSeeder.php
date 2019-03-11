<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Loger',
            'email' => 'logernam@gmail.com',
            'password' => 'loger',
            'avatar' => '/img/UserDefaultAvatar.jpg',
            'phone' => '0905 05 05 05',
            'address' => '01 WallStreet State United State',
            'distric' => 'Long bom',
            'city' => 'Da Nang',
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
