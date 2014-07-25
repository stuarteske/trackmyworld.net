<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'sdeske@googlemail.com',
            'password' => Hash::make('gamma321'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'confirmed' => date('Y-m-d H:i:s'),
            'key' => str_random(40),
        ));

        User::create(array(
            'email' => 'info@stuarteske.com',
            'password' => Hash::make('gamma321'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'key' => str_random(40),
        ));

        User::create(array(
            'email' => 'info@prayerplanner.net',
            'password' => Hash::make('gamma321'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'confirmed' => date('Y-m-d H:i:s'),
            'disabled' => date('Y-m-d H:i:s'),
            'key' => str_random(40),
        ));

        User::create(array(
            'email' => 'admin@example.com',
            'password' => Hash::make('cfa15971'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'confirmed' => date('Y-m-d H:i:s'),
            'key' => str_random(40),
        ));

        User::create(array(
            'email' => 'manager@example.com',
            'password' => Hash::make('cfa15971'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'confirmed' => date('Y-m-d H:i:s'),
            'key' => str_random(40),
        ));

        User::create(array(
            'email' => 'consultant@example.com',
            'password' => Hash::make('cfa15971'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'confirmed' => date('Y-m-d H:i:s'),
            'key' => str_random(40),
        ));

        User::create(array(
            'email' => 'editor@example.com',
            'password' => Hash::make('cfa15971'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'confirmed' => date('Y-m-d H:i:s'),
            'key' => str_random(40),
        ));

        User::create(array(
            'email' => 'seo@example.com',
            'password' => Hash::make('cfa15971'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'confirmed' => date('Y-m-d H:i:s'),
            'key' => str_random(40),
        ));

        User::create(array(
            'email' => 'customer@example.com',
            'password' => Hash::make('cfa15971'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'confirmed' => date('Y-m-d H:i:s'),
            'key' => str_random(40),
        ));
    }

}