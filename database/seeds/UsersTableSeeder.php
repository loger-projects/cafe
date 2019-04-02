<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Faker\Factory as Faker;

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
            'email' => 'logernam@gmail.com',
            'name' => 'Loger',
            'username' => 'admin',
            'password' => Hash::make('loger'),
            'avatar' => url('/img/users/user_thumbnail_1.jpg'),
            'slogan' => 'Excepturi iure consequatur ipsum at delectus.',
            'description' => 'Aperiam iste sunt quia cupiditate quas mollitia laudantium suscipit fuga. Sint cum qui blanditiis. Eius minus quia excepturi exercitationem laudantium cupiditate minima dolorum et. Molestiae quis neque sed nesciunt nisi ut quis qui. Voluptatem corporis cum maxime temporibus. Est voluptates at quibusdam ipsam culpa.',
            'phone' => '0905 05 05 05',
            'address' => '01 WallStreet State United State',
            'distric' => 'Long bom',
            'city' => 'Da Nang',
            'role_id' => 1,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        for($i = 2; $i <= 30; $i++) {
            $faker = Faker::create();
            DB::table('users')->insert([
                'email' => $faker->email,
                'name' => $faker->name,
                'username' => $faker->userName,
                'password' => Hash::make($faker->password),
                'avatar' => url('/img/users/user_thumbnail_'.$i.'.jpg'),
                'slogan' => $faker->sentence(),
                'description' => implode(' ', $faker->sentences(3)),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'distric' => $faker->state,
                'city' => $faker->city,
                'role_id' => 2,
                'email_verified_at' => carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
