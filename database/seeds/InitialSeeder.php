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

        // create 8 stores
        $stores = factory(App\Store::class, 8)->create();

        // for each store, create 5 items
        $stores->each(function ($store) {
            factory('App\Item', 5)->create(['store_id' => $store->id]);
        });

        App\Role::create(['name' => 'moderator']); // does everything (can delete store)
        App\Role::create(['name' => 'manager']); // can create item
        App\Role::create(['name' => 'worker']); // can edit item

        App\Ability::create(['name' => 'delete_store']); // moderator
        App\Ability::create(['name' => 'add_item']); // manager
        App\Ability::create(['name' => 'edit_item']); // worker
    }
}
