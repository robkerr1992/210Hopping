<?php

use Illuminate\Database\Seeder;

class BarFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Feature::class, 100)->create();
    }
}
