<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;

class ProductUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('id', '>=', 2)->get();
        foreach($users as $user) {
            $products = Product::inRandomOrder()->skip(0)->take(6)->get();
            foreach($products as $product) {
                DB::table('product_user')->insert([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
