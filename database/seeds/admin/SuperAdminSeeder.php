<?php

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \Spatie\Permission\Models\Role::create(['guard_name' => 'admin', 'name' => 'super_admin', 'description' => 'برنامه نویس']);


        $super_admins = \App\Admin::where('type', 'super_admin')->get();
        foreach ($super_admins as $super_admin)
            $super_admin->assignRole('super_admin');


        $arr = [

            # General permissions

            // news
            'news index',
            'news show',
            'news update',
            'news delete',
            'news create',

            // news category
            'newsCategory index',
            'newsCategory show',
            'newsCategory update',
            'newsCategory delete',
            'newsCategory create',


            // article
            'article index',
            'article show',
            'article update',
            'article delete',
            'article create',

            // article category
            'articleCategory index',
            'articleCategory show',
            'articleCategory update',
            'articleCategory delete',
            'articleCategory create',

            // faq
            'faq index',
            'faq show',
            'faq update',
            'faq delete',
            'faq create',

            // slider
            'slider index',
            'slider show',
            'slider update',
            'slider delete',
            'slider create',

            // tag
            'tag index',
            'tag show',
            'tag update',
            'tag delete',
            'tag create',

            // about
            'about edit',
            'about update',

            // contact
            'contact edit',
            'contact update',

            // setting
            'setting index',

            // admin
            'admin index',
            'admin show',
            'admin update',
            'admin delete',
            'admin create',

            // user
            'user index',
            'user show',
            'user update',
            'user delete',
            'user create',

            // law & privacy
            'law index',
            'law show',
            'law update',
            'law delete',
            'law create',

            // comment
            'comment index',
            'comment show',
            'comment update',
            'comment delete',
            'comment create',

            // message
            'message index',
            'message show',
            'message update',
            'message delete',
            'message create',

            // profile
            'profile index',


            # Private permission


            // something
            'something index',
            'something show',
            'something update',
            'something delete',
            'something create',



        ];

        $role->givePermissionTo($arr);


    }
}
