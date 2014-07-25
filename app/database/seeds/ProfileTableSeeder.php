<?php
/**
 * Created by PhpStorm.
 * User: cfa
 * Date: 07/07/2014
 * Time: 18:20
 */

class ProfileTableSeeder extends Seeder {

    public function run()
    {
        DB::table('profile')->delete();

        Profile::create(array(
            'user_id' => 1,
            'screenname' => 'peskyesky',
            'name' => 'Stuart Eske',
            'jobtitle' => 'Mobile Application Developer',
        ));

        Profile::create(array(
            'user_id' => 2,
            'screenname' => 'peskyesky',
            'name' => 'Stuart',
            'jobtitle' => 'Site Admin',
        ));
    }

}