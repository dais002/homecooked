<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create users for each role
        factory(App\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => 'password'
        ]);

        factory(App\User::class)->create([
            'name' => 'manager',
            'email' => 'manager@test.com',
            'password' => 'password'
        ]);

        factory(App\User::class)->create([
            'name' => 'guest',
            'email' => 'guest@test.com',
            'password' => 'password'
        ]);

        // create specific roles
        $adminRole = App\Role::create(['name' => 'admin', 'label' => 'Administrator']); // can modify stores
        $managerRole = App\Role::create(['name' => 'manager', 'label' => 'Store Manager']); // can modify items

        // attach created roles
        $admin = App\User::find(1)->roles()->attach($adminRole);
        $manager = App\User::find(2)->roles()->attach($managerRole);

        // create stores
        $stores = factory(App\Store::class, 9)->create();

        // for each store, create items
        $stores->each(function ($store) {
            factory('App\Item', 5)->create(['store_id' => $store->id]);
        });
    }
}
