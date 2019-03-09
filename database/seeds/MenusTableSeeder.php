<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MenuType;
use Carbon\Carbon;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = MenuType::all();
        $i = 1;
        $Food = $i;
        $j = 1;
        $drink = $j;
        foreach($types as $type) {
            if ($type->is_food) {
                for ($i = $Food;$i <= $Food + 2; $i++) {
                    DB::table('menus')->insert(
                        [
                            'name' => 'Food Dist '.$i,
                            'description' => 'Voluptatum iure eveniet. In aut quisquam necessitatibus recusandae labore expedita cupiditate et harum. Aliquam molestiae omnis mollitia illo.',
                            'price' => rand(20,80),
                            'is_new' => false,
                            'rating' => rand(0,5),
                            'thumbnail' => asset("/img/menu/food-$i.jpg"),
                            'type_id' => $type->id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]
                    );
                }
                $Food = $i + 1;
            } else {
                for ($j = $drink; $j <= $drink + 2; $j++) {
                    DB::table('menus')->insert(
                        [
                            'name' => 'Momo Drink '.$j,
                            'description' => 'Ratione tempore nisi ipsa asperiores corporis quo ea voluptatibus dolores. Eaque quia non. Adipisci ut magnam voluptatem. Dolores pariatur qui eius. Quasi neque accusamus sed.',
                            'price' => rand(10,30),
                            'is_new' => false,
                            'rating' => rand(0,5),
                            'thumbnail' => asset("/img/menu/drink-$i.jpg"),
                            'type_id' => $type->id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]
                    );
                }
                $drink = $j + 1;
            }
        }
    }
}
