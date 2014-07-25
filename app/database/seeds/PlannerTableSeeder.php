<?php

class PlannerTableSeeder extends Seeder {

    public function run()
    {
        DB::table('planner')->delete();

        Planner::create(array(
            'user_id' => 1,
            'title' => 'sd 3600 public anonymous',
            'public' => true,
            'listed' => false,
            'featured' => false,
            'allow_anonymous' => true,
            'tags' => serialize(array('public', '3600', 'anonymous' )),
            'logo' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));

        Planner::create(array(
            'user_id' => 1,
            'slot_duration' => 600,
            'title' => 'sd 600 public listed anonymous',
            'public' => true,
            'listed' => true,
            'featured' => false,
            'allow_anonymous' => true,
            'tags' => serialize(array('public', '600', 'listed', 'anonymous' )),
            'logo' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));

        Planner::create(array(
            'user_id' => 1,
            'slot_duration' => 3600,
            'title' => 'sd 3600 public listed featured',
            'public' => true,
            'listed' => true,
            'featured' => true,
            'allow_anonymous' => false,
            'tags' => serialize(array('public', '3600', 'listed', 'featured' )),
            'logo' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));

        Planner::create(array(
            'user_id' => 1,
            'slot_duration' => 3600,
            'title' => 'sd 3600 public listed featured password',
            'public' => true,
            'listed' => true,
            'featured' => true,
            'allow_anonymous' => false,
            'tags' => serialize(array('public', '3600', 'listed', 'featured', 'password' )),
            'logo' => '',
            'password' => Hash::make('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
    }
}