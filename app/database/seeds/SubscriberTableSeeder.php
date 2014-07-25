<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 25/07/2014
 * Time: 18:52
 */

class SubscriberTableSeeder extends Seeder {

    public function run()
    {
        DB::table('subscriber')->delete();

        Subscriber::create(array(
            'email' => 'sdeske@googlemail.com',
            'key' => str_random(40),
        ));

        Subscriber::create(array(
            'email' => 'info@stuarteske.com',
            'key' => str_random(40),
        ));
    }

}