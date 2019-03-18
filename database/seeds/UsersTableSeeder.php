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
            'avatar' => url('/img/users/user_thumbnail_1.jpg'),
            'slogan' => 'Excepturi iure consequatur ipsum at delectus.',
            'description' => 'Aperiam iste sunt quia cupiditate quas mollitia laudantium suscipit fuga. Sint cum qui blanditiis. Eius minus quia excepturi exercitationem laudantium cupiditate minima dolorum et. Molestiae quis neque sed nesciunt nisi ut quis qui. Voluptatem corporis cum maxime temporibus. Est voluptates at quibusdam ipsam culpa.',
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
