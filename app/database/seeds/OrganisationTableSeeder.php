<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 17/07/2014
 * Time: 18:24
 */

class OrganisationTableSeeder extends Seeder {

    public function run()
    {
        DB::table('organisation')->delete();

        Organisation::create(array(
            'owner_id' => 1,
            'slug' => 'church-01',
            'name' => 'Church 01',
            'listed' => true,
            'featured' => true,
            'about' => 'Some information about church 01',
            'location' => 'London',
            'phone' => '07703317195',
            'web' => 'http://stuarteske.com',
            'twitter' => 'stuarteske',
            'facebook' => 'stuarteske',
            'tags' => serialize(array('test', 'new')),
            'logo' => 'logo-placeholder.jpg',
            'disabled' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));

        Organisation::create(array(
            'owner_id' => 1,
            'slug' => 'church-02',
            'name' => 'Church 02',
            'listed' => false,
            'featured' => true,
            'about' => 'Some information about church 02',
            'location' => 'Birmingham, UK',
            'phone' => '07703317195',
            'web' => 'http://stuarteske.com',
            'twitter' => 'stuarteske',
            'facebook' => 'stuarteske',
            'tags' => serialize(array('test', 'new')),
            'logo' => 'logo-placeholder.jpg',
            'disabled' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));

        Organisation::create(array(
            'owner_id' => 1,
            'slug' => 'church-03',
            'name' => 'Church 03',
            'listed' => true,
            'featured' => false,
            'about' => 'Some information about church 03',
            'location' => 'Ramsgate, Thanet',
            'phone' => '07703317195',
            'web' => 'http://stuarteske.com',
            'twitter' => 'stuarteske',
            'facebook' => 'stuarteske',
            'tags' => serialize(array('test', 'new')),
            'logo' => 'logo-placeholder.jpg',
            'disabled' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));

        Organisation::create(array(
            'owner_id' => 1,
            'slug' => 'church-04',
            'name' => 'Church 04',
            'listed' => false,
            'featured' => false,
            'about' => 'Some information about church 04',
            'location' => 'Margate, Thanet',
            'phone' => '07703317195',
            'web' => 'http://stuarteske.com',
            'twitter' => 'stuarteske',
            'facebook' => 'stuarteske',
            'tags' => serialize(array('test', 'new')),
            'logo' => 'logo-placeholder.jpg',
            'disabled' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
    }

}