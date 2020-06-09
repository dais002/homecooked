<?php

use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 5 users
        $users = factory(App\User::class, 5)->create();

        // create 10 cuisines
        factory(App\Cuisine::class, 10)->create();

        // create 10 stores
        $stores = factory(App\Store::class, 5)->create();

        // for each store, create 5 items
        $stores->each(function ($store) {
            factory('App\Item', 5)->create(['store_id' => $store->id]);
        });
    }
}
