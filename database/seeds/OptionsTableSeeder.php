<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            ['key' => 'origin', 'value' => url('/'), 'type' => 'siteInfo'],
            ['key' => 'name', 'value' => config('app.name'), 'type' => 'siteInfo'],
            ['key' => 'logoBlack', 'value' => url('/img/SiteHeaderLogoBlack.jpg'), 'type' => 'siteInfo'],
            ['key' => 'logoWhite', 'value' => url('/img/SiteHeaderLogoWhite.jpg'), 'type' => 'siteInfo']
        ]);
    }
}
